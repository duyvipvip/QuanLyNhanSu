const mongoose = require("mongoose");
const chucvuSchema = mongoose.Schema({
    tenchucvu: {
        type: String,
        require: true
    },
    
}, { collection: 'chucvu'});
module.exports = mongoose.model('chucvu', chucvuSchema);
