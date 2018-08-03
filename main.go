package main

import (
	_ "github.com/go-sql-driver/mysql"
	db "github.com/weitung/api/database"
)

func main() {
	db.InitDb()
	defer db.Db.Close()

	router := initRouter()
	router.Run(":8000")
}
