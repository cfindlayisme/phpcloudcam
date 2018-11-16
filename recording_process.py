# Copyright 2018 Chuck Findlay
# This software is licensed under the GNU Lesser General Public License v3.0

# Our imports
import configparser
import MySQLdb

# Config read
config = configparser.ConfigParser()
config.sections()
config.read('config.ini')

# Configuration options grab
mysqlUsername = config.get('mysql', 'username')
mysqlPassword = config.get('mysql', 'password')
mysqlHostname = config.get('mysql', 'host')
mysqlDatabase = config.get('mysql', 'database')

# Connect to SQL database. One connection is fine - we'll close it at the end of the script
# TODO: Error handling if the SQL connection fails
dbConnection = MySQLdb.connect(db=mysqlDatabase, user=mysqlUsername, password=mysqlPassword, host=mysqlHostname, port=3306)

def insertRecording(file, content, cameraid, timestamp):
    """Inserts recording into MySQL database
    Returns False is insertion failed, and True if succeeded
    """

    # Open up the database
    db = dbConnection.cursor()

    # TODO: Error handling if the insert fails
    sql = 'INSERT INTO `recordings` (`file`, `content`, `cameraid`, `timestamp`)'
    val = (file, content, cameraid, timestamp)
    db.execute(sql, val)
    db.close()

    return True

dbConnection.close()