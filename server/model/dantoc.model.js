const mongoose = require("mongoose");
const dantocSchema = mongoose.Schema({
    tendantoc: {
        type: String,
        require: true
    },
    
}, { collection: 'dantoc'});
module.exports = mongoose.model('dantoc', dantocSchema);
