package database

import (
	"database/sql"
	"log"
)

//Db sql con
var Db *sql.DB

//InitDb initialize
func InitDb() {
	var err error
	Db, err = sql.Open("mysql", "allen:allen2001@tcp(127.0.0.1:3306)/web")
	checkerr(err, "mysql connection")

	// Db.SetMaxIdleConns(20)
	// Db.SetMaxOpenConns(20)

	err = Db.Ping()
	checkerr(err, "mysql ping")
}

func checkerr(err error, msg string) {
	if err != nil {
		log.Fatalf("%s error\n", msg)
		return
	}
	return
}
