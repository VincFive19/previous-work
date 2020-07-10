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

connection = sqlite3.connect("database.db")
cursor = connection.cursor()


# Select Violations
selectViolations = """SELECT violation_code, violation_description, count(violation_code) FROM Violations GROUP BY violation_code, violation_description"""
cursor.execute(selectViolations)

allViolations = cursor.fetchall()




# Set Title

ws.title = "Violations Types"

# Add Header

ws.append(["Code", "Description", "Count"])

# Add Data

for row in allViolations:
    ws.append(row)


# Add Footer

allViolations = numpy.array(allViolations)
sumOfValues = sum(allViolations[:,2].astype(int))
ws.append(["", "Total Violations", str(sumOfValues)]) 

# Save Workbook

wb.save("ViolationTypes.xlsx")


connection.commit()


connection.close()

print("Thank you")