var mysql = require('mysql');

connection = (host,username,password) => {
	var con = mysql.createConnection({
		host:host,
		user:username,
		password:password
	});

	con.connect(function(err){
		if(err)
			throw err;
		console.log("SUCCESS WITH PASS    : "+password);
	});
}

try{
connection("localhost","root","");
}
catch(e)
{
	console.log("error");
}