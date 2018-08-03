package database

import (
	"database/sql"
	"log"
)

var Db *sql.DB

func initDb() {
	Db, err := sql.Open("mysql", "root:0000@tcp(127.0.0.1:3306)/web?parseTime=true")
	checkerr(err, "mysql connection")

	// Db.SetMaxIdleConns(20)
	// Db.SetMaxOpenConns(20)

	err = Db.Ping()
	checkerr(err, "mysql ping")
	return
}

func checkerr(err error, msg string) {
	if err != nil {
		log.Fatalf("%s error\n", msg)
		return
	}
	return
}
