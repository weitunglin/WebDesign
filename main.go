package main

import (
	"encoding/json"
	"log"
	"net/http"

	"github.com/gorilla/mux"
)

type book struct {
	id     string  `json:"id"`
	title  string  `json:"title"`
	author *author `json:"author"`
}

type author struct {
	firstname string `json:"firstname"`
	lastname  string `json:"lastname"`
	nickname  string `json:"nickname"`
}

var books []book

func homehandler(w http.ResponseWriter, r *http.Request) {

}

func getbooks(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	json.NewEncoder(w).Encode(books)
}

func getbook(w http.ResponseWriter, r *http.Request) {

}

func createbook(w http.ResponseWriter, r *http.Request) {

}

func updatebook(w http.ResponseWriter, r *http.Request) {

}

func deletebook(w http.ResponseWriter, r *http.Request) {

}

func main() {

	r := mux.NewRouter()

	books = append(books, book{id: "1", title: "bookone", author: &author{firstname: "weitung", lastname: "lin", nickname: "allen"}})
	books = append(books, book{id: "2", title: "booktwo", author: &author{firstname: "allen", lastname: "weitung", nickname: "tung"}})

	r.HandleFunc("/", homehandler)
	r.HandleFunc("/book", getbooks).Methods("GET")
	r.HandleFunc("/book/{id}", getbook).Methods("GET")
	r.HandleFunc("/book/", createbook).Methods("POST")
	r.HandleFunc("/book/{id}", updatebook).Methods("PUT")
	r.HandleFunc("/book/{id}", deletebook).Methods("DELETE")

	log.Fatal(http.ListenAndServe("localhost:3000", r))

}
