const mongoose = require("mongoose");
const hedaotaoSchema = mongoose.Schema({
    tenhedaotao: {
        type: String,
        require: true
    },
    
}, { collection: 'hedaotao'});
module.exports = mongoose.model('hedaotao', hedaotaoSchema);
