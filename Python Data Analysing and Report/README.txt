Welcome

Author - Tomas Heligr-Pyke

Initial Notes

There are two folders within this zip, one which has a quick version of all code (No writing to console, scripts are located in the folder named QUICK), and one which shows exactly what the script is doing (writes to console, scripts are located in the folder named SLOW). Please note these scripts do exactly the same thing, just one writes to console. SLOW is slower to process all the data and QUICK is faster. 

The Report folder contains the report, as well as images of the graphs and the exported ViolationTypes.xlsx file for further analysis.

Format of excel tables in order to work with these applications:

Violation Table:
+--------+---------------+----------------+---------------------------------------------------------------------------------------+-------------------+
| points | serial_number | violation_code | violation_description                                                                 | violation_status  |
+--------+---------------+----------------+---------------------------------------------------------------------------------------+-------------------+
| 1      | DAJ5UNMSF     | F044           | # 44. Floors, walls and ceilings: properly built, maintained in good repair and clean | OUT OF COMPLIANCE |
+--------+---------------+----------------+---------------------------------------------------------------------------------------+-------------------+
| 4      | DAT2HKIRE     | F007           | # 07. Proper hot and cold holding temperatures                                        | OUT OF COMPLIANCE |
+--------+---------------+----------------+---------------------------------------------------------------------------------------+-------------------+


Inspection Table:
+---------------+-------------+------------------------+---------------+-------------+----------------------------+----------------+--------------+-------+-----------+--------------------------------+-----------------------------------------+--------------------+----------------------------+----------------+-----------+-------+---------------+--------------+---------------------+
| activity_date | employee_id | facility_address       | facility_city | facility_id | facility_name              | facility_state | facility_zip | grade | owner_id  | owner_name                     | pe_description                          | program_element_pe | program_name               | program_status | record_id | score | serial_number | service_code | service_description |
+---------------+-------------+------------------------+---------------+-------------+----------------------------+----------------+--------------+-------+-----------+--------------------------------+-----------------------------------------+--------------------+----------------------------+----------------+-----------+-------+---------------+--------------+---------------------+
| 9/05/2017     | EE0000593   | 17660 CHATSWORTH ST    | GRANADA HILLS | FA0175397   | HOVIK'S FAMOUS MEAT & DELI | CA             | 91344        | A     | OW0181955 | JOHN'S FAMOUS MEAT & DELI INC. | FOOD MKT RETAIL (25-1,999 SF) HIGH RISK | 1612               | HOVIK'S FAMOUS MEAT & DELI | ACTIVE         | PR0168541 | 98    | DAHDRUQZO     | 1            | ROUTINE INSPECTION  |
+---------------+-------------+------------------------+---------------+-------------+----------------------------+----------------+--------------+-------+-----------+--------------------------------+-----------------------------------------+--------------------+----------------------------+----------------+-----------+-------+---------------+--------------+---------------------+
| 10/04/2017    | EE0000126   | 3615 PACIFIC COAST HWY | TORRANCE      | FA0242138   | SHAKEY'S PIZZA             | CA             | 90505        | A     | OW0237843 | SCO, LLC                       | RESTAURANT (61-150) SEATS HIGH RISK     | 1638               | SHAKEY'S PIZZA             | ACTIVE         | PR0190290 | 94    | DAL3SBUE0     | 1            | ROUTINE INSPECTION  |
+---------------+-------------+------------------------+---------------+-------------+----------------------------+----------------+--------------+-------+-----------+--------------------------------+-----------------------------------------+--------------------+----------------------------+----------------+-----------+-------+---------------+--------------+---------------------+

These table headers are case sensitive. Data in above tables are examples only.

Python scripts:

createdb_food.py: 
	This script creates a database based on two excel tables, Violation table and Inspection table. These tables need to exist in the directory of the script in
	order for the script to work. Each time this is run it will replace old rows depending on id (as chosen by the serial_number and owner_id). 
	Once run it will create a database file named database.db.
	IMPORTANT:
		Violation table and inspection table must be in the same directory as this script.
		Tables must be named: violations.xlsx and inspections.xlsx.
		Tables must be in the format as shown above.

sql_food.py:
	This script finds all businesses within the database that have had at least one violation, lists their names in console alphabetically, then lists them again
	in order of amount of violations. Format as follows:
		Business Name - Amount of Violations: 8
	IMPORTANT:
		database.db file MUST be in the same directory as this script

excel_food.py:
	This script finds all violation codes (Distinct), their descriptions, then lists how many violations of that type have occured.
	It then adds this new data to an .xlsx format file (Excel Table) in the below format:

+------+-----------------------------------------------------------------------------------------+-------+
| Code | Description                                                                             | Count |
+------+-----------------------------------------------------------------------------------------+-------+
| F001 | # 01a. Demonstration of knowledge                                                       | 41    |
+------+-----------------------------------------------------------------------------------------+-------+
| F004 | # 04. Proper eating, drinking, or tobacco use                                           | 15    |
+------+-----------------------------------------------------------------------------------------+-------+
| F005 | # 05. Hands clean and properly washed; gloves used properly                             | 27    |
+------+-----------------------------------------------------------------------------------------+-------+
| F006 | # 06. Adequate handwashing facilities supplied & accessible                             | 111   |
+------+-----------------------------------------------------------------------------------------+-------+
| .... | ..................................................................			 | ..... |
+------+-----------------------------------------------------------------------------------------+-------+
| F050 | # 51. Permit Suspension                                                                 | 8     |
+------+-----------------------------------------------------------------------------------------+-------+
| F052 | # 01b. Food safety certification                                                        | 72    |
+------+-----------------------------------------------------------------------------------------+-------+
|      | Total Violations                                                                        | 3499  |
+------+-----------------------------------------------------------------------------------------+-------+

	IMPORTANT:
		database.db script must be in the same directory as this script.
		Exported file is named violationTypes.xlsx


numpy_food.py: 
	This script gathers all data from the database file (MUST BE SAME DATABASE MADE BY ABOVE SCRIPTS), then exports it as a viewable graph. This graph 
	includes the total of the post code with the most violations over time, the total of the post code with the lowest violations over time, and 
	the Average of all of California over time. The second graph shows the Average violations of McDonalds and Burger King over time in all of California.
	IMPORTANT:
		database.db script must be in the same directory as this script.
		database.db must contain a Violations table and Inspections table, in the format created by the above scripts.

