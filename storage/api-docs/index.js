const fs = require('fs')
let swagger = require("./init.json");
const user = require("./auth.json");

swagger["paths"] = {
    ...user.paths,
};

swagger["definitions"] = {
    ...user.definitions,
};

fs.writeFile('./api-docs.json', JSON.stringify(swagger), err => {
    if (err) {
        console.error(err)
        return
    }
    console.error("file is written successful")
})

