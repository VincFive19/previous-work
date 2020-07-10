import numpy as np
import matplotlib.pyplot as plt
import random
import sqlite3
from calendar import monthrange
from datetime import datetime




print("Connecting to Database")
connection = sqlite3.connect("database.db")
cursor = connection.cursor()

print("Connected to Database")

#number of violations per month fro the postcode with the highest total violations
#number of violations per month from the postcode with lowest total violations
#average number of violations per month for all of california


#  Find all post codes and their total
findPostCodeWithHighest = """select facility_zip, (select count(*) from Violations where serial_number = Inspections.serial_number) as vcount FROM Inspections ORDER BY vcount"""
cursor.execute(findPostCodeWithHighest)

data = cursor.fetchall()
nparray = np.array(data)


#Get all data dated
perMonth = """
select facility_zip, strftime("%Y %m", activity_date) AS Month, (select count(*) from Violations where serial_number = Inspections.serial_number) as countViolations from Inspections GROUP BY facility_zip, strftime("%Y %m", activity_date) ORDER BY activity_date"""

cursor.execute(perMonth)
dataPerMonth = cursor.fetchall()

processedData = []

dataPerMonth = list(map(list, dataPerMonth))

for row in dataPerMonth:
    dateValue = row[1].split()
    days = monthrange(int(dateValue[0]), int(dateValue[1]))

    



# Find highest zip code
#THis is meant to find all values with 0 in it, then remove those form the array as they break it
result = np.where(nparray == '0')
arr = np.delete(nparray, result[0], axis=0)

dataPerMonth = np.array(dataPerMonth)

# Find highest and lowest post code
highestViolationPostCode = arr[-1][0]
lowestViolationPostCode = arr[0][0]


highestLocation = np.where(dataPerMonth == '{}'.format(highestViolationPostCode))
lowestLocation = np.where(dataPerMonth == '{}'.format(lowestViolationPostCode))

highest = dataPerMonth[np.array(highestLocation[0])]
lowest = dataPerMonth[np.array(lowestLocation[0])]

# Convert to NP Object Array
highest = np.array(highest, dtype='O')
lowest = np.array(lowest, dtype='O')

# FIND AVERAGE OF ALL OF CALIFORNIA

allOfCalifornia = """
select strftime("%Y %m", activity_date) AS Month, (select count(*) from Violations where serial_number = Inspections.serial_number) as countViolations from Inspections GROUP BY strftime("%Y %m", activity_date) ORDER BY activity_date"""


cursor.execute(allOfCalifornia)

allOfCaliforniaData = cursor.fetchall()


allOfCaliforniaData = list(map(list, allOfCaliforniaData))

# Find average of all of California
for row in allOfCaliforniaData:
    dateValue = row[0].split()
    days = monthrange(int(dateValue[0]), int(dateValue[1]))
    row[1] = row[1]/len(days)

allOfCaliforniaData = np.array(allOfCaliforniaData, dtype='O')



# Convert to datetime and float
for row in highest:
    row[1] = datetime.strptime(row[1], '%Y %m')
    row[2] = float(row[2])
    
for row in lowest:
    row[1] = datetime.strptime(row[1], '%Y %m')
    row[2] = float(row[2])

for row in allOfCaliforniaData:
    row[0] = datetime.strptime(row[0], '%Y %m')
    row[1] = float(row[1])
    
    


#Plot above data
plt.subplot(2, 1, 1)
plt.plot(highest[:, 1], highest[:, 2], 'r', label='Highest Average, id = {}'.format(highestViolationPostCode))
plt.plot(lowest[:, 1], lowest[:, 2], 'b', label='Lowest Average, id = {}'.format(lowestViolationPostCode))
plt.plot(allOfCaliforniaData[:, 0], allOfCaliforniaData[:, 1], 'y', label='Average of all of California (Every Postcode)')

plt.title('Violations compared to Post Code')
plt.xlabel('Date')
plt.ylabel('# Violations')
plt.setp(plt.xticks()[1], rotation=30, ha='right')
plt.legend(loc='lower right')

# Find MCDonalds and BurgerKing plots

allMcDonalds = """
select strftime("%Y %m", activity_date) AS Month, (select count(*) from Violations where serial_number = Inspections.serial_number) as countViolations from Inspections WHERE facility_name LIKE "%McDonald%" GROUP BY strftime("%Y %m", activity_date) ORDER BY activity_date"""


allBurgerKings = """
select strftime("%Y %m", activity_date) AS Month, (select count(*) from Violations where serial_number = Inspections.serial_number) as countViolations from Inspections WHERE facility_name LIKE "%Burger King%" GROUP BY strftime("%Y %m", activity_date) ORDER BY activity_date"""

cursor.execute(allMcDonalds)
allMcDonaldsData = cursor.fetchall()

cursor.execute(allBurgerKings)
allBurgerKingsData = cursor.fetchall()

allMcDonaldsData = np.array(allMcDonaldsData, dtype='O')
allBurgerKingsData = np.array(allBurgerKingsData, dtype='O')

# find the average, and month range
for row in allMcDonaldsData:
    dateValue = row[0].split()
    days = monthrange(int(dateValue[0]), int(dateValue[1]))
    row[1] = row[1]/len(days)

for row in allBurgerKingsData:
    dateValue = row[0].split()
    days = monthrange(int(dateValue[0]), int(dateValue[1]))
    row[1] = row[1]/len(days)

#  Convert to datetime and float
for row in allMcDonaldsData:
    row[0] = datetime.strptime(row[0], '%Y %m')
    row[1] = float(row[1])
    
for row in allBurgerKingsData:
    row[0] = datetime.strptime(row[0], '%Y %m')
    row[1] = float(row[1])


#  PLot McDonalds and Burger King Data
plt.subplot(2, 1, 2)
plt.plot(allMcDonaldsData[:, 0], allMcDonaldsData[:, 1], 'y', label='McDonalds')
plt.plot(allBurgerKingsData[:, 0], allBurgerKingsData[:, 1], 'r', label='Burger Kings')

# Axis titles and labels
plt.title('Violations compared to Restaurant')
plt.xlabel('Date')
plt.ylabel('# Violations')
plt.setp(plt.xticks()[1], rotation=30, ha='right')
plt.legend(loc='lower right')

# This makes sure that the graph is formatted correctly
plt.tight_layout()

# Show graphs
plt.show()
