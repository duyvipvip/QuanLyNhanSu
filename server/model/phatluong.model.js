const mongoose = require("mongoose");
const phatluongSchema = mongoose.Schema({
    idnhanvien: {
        type: mongoose.Schema.Types.ObjectId,
        ref: 'nhanvien'
    },
    thangphat: String,
    ngayphat: Date,
    lydophat: String,
    sotienphat: Number
}, { collection: 'phatluong'});
module.exports = mongoose.model('phatluong', phatluongSchema);
