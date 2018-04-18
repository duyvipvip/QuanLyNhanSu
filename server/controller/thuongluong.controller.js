const thuongluongModel = require('../model/thuongluong.model');
const nhanvienModel = require('../model/nhanvien.model');

module.exports = {
    timkiemmotthuongluong: timkiemmotthuongluong,
    taomoithuongluong: taomoithuongluong,
    chinhsuathuongluong: chinhsuathuongluong,
    xoathuongluong: xoathuongluong
}

// LẤY TẤT MỘT THƯỞNG LƯƠNG
function timkiemmotthuongluong(body){
    return thuongluongModel.find(
        {
            idnhanvien: body.idnhanvien ,_id: body.idthuongluong
        })
        .then((thuongluong) => {
            return Promise.resolve(thuongluong);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

// TẠO MỚI LƯƠNG THƯƠNG
function taomoithuongluong(body){
    let thuongluong = new thuongluongModel(body);
    return thuongluong.save()
        .then((thuongluong) => {
            return nhanvienModel.findById(thuongluong.idnhanvien)
                .then((nhanvien) => {
                    nhanvien.thuongluongs.push(thuongluong._id);
                    return nhanvien.save()
                        .then(() => {
                            return Promise.resolve(thuongluong);
                        })
                })
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

// CHỈNH SỬA THƯỞNG LƯƠNG
function chinhsuathuongluong(body){
    let data = {
        "thangthuong" : body.thangthuong,
        "ngaythuong" : body.ngaythuong,
        "sotienthuong" : body.sotienthuong,
        "lydothuong" : body.lydothuong
    }
    return thuongluongModel.findOneAndUpdate({_id: body.idthuongluong, idnhanvien: body.idnhanvien}, data)
    .then((thuongluong) => {
        return Promise.resolve(thuongluong);
    })
    .catch((err) => {
        return Promise.reject(err);
    })
}

// XOÁ THƯỞNG LƯƠNG
function xoathuongluong(body){
    return thuongluongModel.findByIdAndRemove({_id: body.idthuongluong})
        .then((thuongluong) => {
            return Promise.resolve(thuongluong);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}
