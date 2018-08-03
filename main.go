package main

import (
	db "github.com/weitung/api/database"
)

func main() {
	defer db.Db.Close()

	router := initRouter()
	router.Run(":8000")
}
