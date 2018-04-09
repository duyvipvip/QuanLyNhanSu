const mongoose = require("mongoose");
const nhanvienSchema = mongoose.Schema({
    hoten: String,
    gioitinh: String,
    email: String,
    ngaysinh: Date,
    cmnd: String,
    hinhanh: {
        type: String,
        default: 'imagenull.png'
    },
    diachi: String,
    sodienthoai: String,
    giadinh: String,
    tinhtrang: String,
    chucvu: String,
    ngoaingu: String,
    tinhthanh: String,
    hedaotao: String,
    dantoc: String,
    thuongluongs: [{
        type: mongoose.Schema.Types.ObjectId,
        ref: 'thuongluong'
    }]
}, { collection: 'nhanvien'});
module.exports = mongoose.model('nhanvien', nhanvienSchema);
