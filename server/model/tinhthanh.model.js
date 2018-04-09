const mongoose = require("mongoose");
const tinhthanhSchema = mongoose.Schema({
    tentinhthanh: {
        type: String,
        require: true
    },
    
}, { collection: 'tinhthanh'});
module.exports = mongoose.model('tinhthanh', tinhthanhSchema);
