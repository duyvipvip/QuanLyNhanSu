const mongoose = require("mongoose");
const ngoainguSchema = mongoose.Schema({
    tenngoaingu: {
        type: String,
        require: true
    },
    
}, { collection: 'ngoaingu'});
module.exports = mongoose.model('ngoaingu', ngoainguSchema);
