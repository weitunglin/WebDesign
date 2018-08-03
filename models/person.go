package models

//Person struct
type Person struct {
	Idnumber  int    `json:"idnumber" form:"idnumber"`
	Firstname string `json:"firstname" form:"firstname"`
	Lastname  string `json:"lastname" form:"lastname"`
	Age       int    `json:"age" form:"age"`
}
