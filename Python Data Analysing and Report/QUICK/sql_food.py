import sqlite3
import numpy

# connect to database
connection = sqlite3.connect("database.db")
cursor = connection.cursor()


#  Create table if not exists
createPreviousViolations = """CREATE TABLE IF NOT EXISTS PreviousViolations(
    id INTEGER PRIMARY KEY,
    facility_name VARCHAR,
    facility_address VARCHAR,
    facility_zip VARCHAR,
    facility_city VARCHAR
)"""

cursor.execute(createPreviousViolations)


# select with at least one violation
selectBusinessWViolation = """select distinct *, (select count(*) from Violations where serial_number = Inspections.serial_number) as violation_Count from Inspections ORDER BY facility_name"""

cursor.execute(selectBusinessWViolation)
businessViolation = cursor.fetchall()

print("\nBusinesses with at least one violation (In alphabetical Order):\n")
# Prints above selection in alphabetical order. Also inserts into database
for row in businessViolation:
    if row[21] >= 1:
        print(row[6])
        insertToPreviousViolations = """INSERT OR REPLACE INTO PreviousViolations (id, facility_name, facility_address, facility_zip, facility_city) VALUES ((SELECT id FROM Inspections WHERE serial_number = "{}" AND facility_name = "{}" AND facility_address = "{}") OR Null, "{}", "{}", "{}", "{}")""".format(row[18], row[6], row[3], row[6], row[3], row[8], row[4])

        cursor.execute(insertToPreviousViolations)
    
#1 activity_date	2employee_id	3facility_address	4facility_city	5facility_id	6facility_name	7facility_state	8facility_zip	9grade	10owner_id	11owner_name	12pe_description	13program_element_pe	14program_name	15program_status	16record_id	score	17serial_number	18service_code	19service_description


# Does the same as above, but shows amount of violations and orders it by the amount
selectBusinessWViolationOrderByViolation = """select distinct *, (select count(*) from Violations where serial_number = Inspections.serial_number) as violation_Count from Inspections ORDER BY violation_Count"""

cursor.execute(selectBusinessWViolationOrderByViolation)


businessViolationOrderByViolation = cursor.fetchall()

print("\nBusinesses with at least one violation, listed from least violations to most\n")

for row in businessViolationOrderByViolation:
    if row[21] >= 1:
        print(row[6], "- Amount of Violations = ", row[21])


# commit and close

connection.commit()
connection.close()
print("\nThank you for using")

