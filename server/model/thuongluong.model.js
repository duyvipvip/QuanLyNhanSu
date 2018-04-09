const mongoose = require("mongoose");
const nhanvienSchema = mongoose.Schema({
    idnhanvien: {
        type: mongoose.Schema.Types.ObjectId,
        ref: 'nhanvien'
    },
    thangthuong: String,
    ngaythuong: Date,
    lydothuong: String,
    sotienthuong: Number
}, { collection: 'thuongluong'});
module.exports = mongoose.model('thuongluong', nhanvienSchema);
