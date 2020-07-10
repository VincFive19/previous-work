# -*- coding: utf-8 -*-
"""
Created on Sat Sep  7 10:30:59 2019

@author: tomas
"""

import openpyxl
import sqlite3
import numpy

# Creates workbook, sets active sheet
wb = openpyxl.Workbook()
ws = wb.active

#Connects to Database
print("Connecting to Database")
connection = sqlite3.connect("database.db")
cursor = connection.cursor()

print("Connected to Database")

# Select Violations
print("Selecting Violations")
selectViolations = """SELECT violation_code, violation_description, count(violation_code) FROM Violations GROUP BY violation_code, violation_description"""
cursor.execute(selectViolations)

allViolations = cursor.fetchall()


print("Violations Fetched")

# Set Title
print("Setting Title 'Violation Types'")
ws.title = "Violations Types"

# Add Header
print("Adding Header")
ws.append(["Code", "Description", "Count"])

# Add Data
print("Adding Data")
for row in allViolations:
    ws.append(row)
print("Data Added")

# Add Footer
print("Adding footer")
allViolations = numpy.array(allViolations)
sumOfValues = sum(allViolations[:,2].astype(int))
ws.append(["", "Total Violations", str(sumOfValues)]) 

# Save Workbook
print("Saving")
wb.save("ViolationTypes.xlsx")

print("Committing")
connection.commit()

print("Closing Connection")
connection.close()

print("Thank you")