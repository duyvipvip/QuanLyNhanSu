const mongoose = require("mongoose");
const nguoidungSchema = mongoose.Schema({
    tendangnhap: String,
    email: String,
    password: String,
    quyenthem: {
        type: String,
        default: 0
    },
    quyenxoa: {
        type: String,
        default: 0
    },
    quyensua: {
        type: String,
        default: 0
    },
    kichhoat: {
        type: String,
        default: 'false'
    },
    hinhanh: {
        type: String,
        default: "imagenull.png"
    },
    token: {
        type: String
    },
    id: {
        type: String
    }
}, { collection: 'nguoidung'});
module.exports = mongoose.model('nguoidung', nguoidungSchema);
