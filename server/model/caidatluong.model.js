const mongoose = require("mongoose");
const caidatluongSchema = mongoose.Schema({
    luongbatdautinhthue: {
        type: Number,
    },
    bhxhdoanhnghiep: {
        type: Number,
    },
    bhytdoanhnghiep: {
        type: Number,
    },
    bhtndoanhnghiep: {
        type: Number,
    },
    bhxhnguoilaodong: {
        type: Number,
    },
    bhytnguoilaodong: {
        type: Number,
    },
    bhtnnguoilaodong: {
        type: Number,
    },
    muc5: {
        type: Number,
    },
    muc10: {
        type: Number,
    },
    muc15: {
        type: Number,
    },
    muc20: {
        type: Number,
    },
    muc25: {
        type: Number,
    },
    muc30: {
        type: Number,
    },
    muc35: {
        type: Number,
    }
}, { collection: 'caidatluong'});
module.exports = mongoose.model('caidatluong', caidatluongSchema);
