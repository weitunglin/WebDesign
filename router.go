package main

import (
	"github.com/gin-gonic/gin"

	. "github.com/weitung/api/handlers"
)

func initRouter() *gin.Engine {
	router := gin.Default()

	router.GET("/", Index)

	groupPerson := router.Group("/person")
	{
		groupPerson.GET("/", Getpeople)
		groupPerson.GET("/:id", Getperson)
		groupPerson.PUT("/:id", Modperson)
		groupPerson.POST("/", Addperson)
		groupPerson.DELETE("/:id", Delperson)
	}

	return router
}
