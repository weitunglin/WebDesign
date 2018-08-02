package main

import (
	"github.com/gin-gonic/gin"
)

func initRouter() *gin.Engine {
	router := gin.Default()

	router.GET("/", index)

	groupPerson := router.Group("/person")
	{
		groupPerson.GET("/:id", getperson)
		groupPerson.PUT("/:id", modperson)
		groupPerson.POST("/", addperson)
		groupPerson.DELETE("/:id", delperson)
	}

	return router
}
