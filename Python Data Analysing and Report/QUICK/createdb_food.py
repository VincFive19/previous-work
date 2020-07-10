import sqlite3
import openpyxl
import sys
import time



# Import Workbooks, read only is more efficient (stops memory error)
inspectionswb = openpyxl.load_workbook('inspections.xlsx', read_only=True)
violationswb = openpyxl.load_workbook('violations.xlsx', read_only=True)


# Sets active workbook
inspectionsSheet = inspectionswb.active
violationsSheet = violationswb.active



# connect to sqlite database


connection = sqlite3.connect("database.db")
cursor = connection.cursor()

    # id INTEGER PRIMARY KEY AUTOINCREMENT,
# Create Tables
createInspectionsTable = """CREATE TABLE IF NOT EXISTS Inspections (
    id INTEGER PRIMARY KEY,
    activity_date DATE,
    employee_id CHAR(9),
    facility_address VARCHAR,
    facility_city VARCHAR,
    facility_id CHAR(9),
    facility_name VARCHAR,
    facility_state CHAR(2),
    facility_zip VARCHAR,
    grade CHAR(1),
    owner_id CHAR(9),
    owner_name VARCHAR,
    pe_description VARCHAR,
    program_element_pe INTEGER,
    program_name VARCHAR,
    program_status VARCHAR,
    record_id CHAR(9),
    score INTEGER,
    serial_number CHAR(9) REFERENCES Violations(serial_number),
    service_code INTEGER,
    service_description VARCHAR
);"""
# id INTEGER PRIMARY KEY,
createViolationsTable = """CREATE TABLE IF NOT EXISTS Violations (
    id INTEGER PRIMARY KEY,
    points INTEGER,
    serial_number CHAR(9),
    violation_code CHAR(4),
    violation_description VARCHAR,
    violation_status VARCHAR
);"""

# create tables if not exist
cursor.execute(createInspectionsTable)
cursor.execute(createViolationsTable)


# Import Excel Tables into SQL


#  read rows
inspectionsRow = tuple(inspectionsSheet.rows)
violationsRow = tuple(violationsSheet.rows)

inspectionArray = []
violationsArray = []


# loads inspections into array
for i in range(len(inspectionsRow)):
    inspectionArray.append([])
    # print("\nrow Inspection: ", i)
    for cell in inspectionsRow[i]:

        # print(cell.value)

        cellValue = cell.value

        if isinstance(cellValue, str):
            cellValue = cellValue.replace('"', '""')

        inspectionArray[i].append(cellValue)
        # print(inspectionArray)




# loads violations into an array
for i in range(len(violationsRow)):
    violationsArray.append([])
    # print("\nrow Inspection: ", i)
    for cell in violationsRow[i]:
        # print(cell.value)
        cellValue = cell.value

        if isinstance(cellValue, str):
            cellValue = cellValue.replace('"', '""')

        violationsArray[i].append(cellValue)
        # print(inspectionArray)



# Remove headings
inspectionArray.pop(0)
violationsArray.pop(0)

#  Add data to Database

# create insert strings


# insert into inspection table
for i in range(len(inspectionArray)):
    formatInspections = """INSERT OR REPLACE INTO Inspections (id, activity_date, employee_id, facility_address, facility_city, 
                        facility_id, facility_name, facility_state, facility_zip, grade, owner_id, owner_name, 
                        pe_description, program_element_pe, program_name, program_status, record_id, score, 
                        serial_number, service_code, service_description) VALUES ((SELECT id FROM Inspections WHERE serial_number = "{}" AND owner_id = "{}") OR Null, "{}", "{}", "{}", "{}", "{}", "{}", "{}", {}, "{}", 
                        "{}", "{}", "{}", {}, "{}", "{}", "{}", {}, "{}", {}, "{}");""".format(
        inspectionArray[i][17], inspectionArray[i][9],

        inspectionArray[i][0],
                                                                               inspectionArray[i][1],
                                                                               inspectionArray[i][2],
                                                                               inspectionArray[i][3],
                                                                               inspectionArray[i][4],
                                                                               inspectionArray[i][5],
                                                                               inspectionArray[i][6],
                                                                               inspectionArray[i][7],
                                                                               inspectionArray[i][8],
                                                                               inspectionArray[i][9],
                                                                               inspectionArray[i][10],
                                                                               inspectionArray[i][11],
                                                                               inspectionArray[i][12],
                                                                               inspectionArray[i][13],
                                                                               inspectionArray[i][14],
                                                                               inspectionArray[i][15],
                                                                               inspectionArray[i][16],
                                                                               inspectionArray[i][17],
                                                                               inspectionArray[i][18],
                                                                               inspectionArray[i][19])
    # Add into database


    cursor.execute(formatInspections)



# insert to violation table
for i in range(len(violationsArray)):

    formatViolations = """INSERT OR REPLACE INTO Violations (id, points, serial_number, violation_code, violation_description, 
    violation_status) VALUES ((SELECT id FROM Violations WHERE serial_number = "{}" AND violation_code = "{}") OR Null, {}, "{}", "{}", "{}", "{}")""".format(violationsArray[i][1],
                                                             violationsArray[i][2], violationsArray[i][0], violationsArray[i][1],
                                                             violationsArray[i][2],
                                                             violationsArray[i][3], violationsArray[i][4])

    # execute Insert
    cursor.execute(formatViolations)



# committing

connection.commit()


connection.close()

print("All processes complete, Database file is database.db")
