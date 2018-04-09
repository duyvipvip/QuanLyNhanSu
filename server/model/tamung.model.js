const mongoose = require("mongoose");
const tamungSchema = mongoose.Schema({
    idnhanvien: {
        type: mongoose.Schema.Types.ObjectId,
        ref: 'nhanvien'
    },
    thangtamung: String,
    ngaytamung: Date,
    lydotamung: String,
    sotientamung: Number
}, { collection: 'tamungluong'});
module.exports = mongoose.model('tamungluong', tamungSchema);
