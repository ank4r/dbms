var mongoose = require('mongoose');

var loginSchema = mongoose.Schema({
	id : String,
	first_name : String,
	last_name : String,
	password : String
});

module.exports = mongoose.model(loginSchema);