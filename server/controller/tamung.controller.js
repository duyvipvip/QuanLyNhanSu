const tamungModel = require('../model/tamung.model');
const nhanvienModel = require('../model/nhanvien.model');

module.exports = {
    timkiemmottamung: timkiemmottamung,
    taomoitamung: taomoitamung,
    chinhsuatamung: chinhsuatamung,
    xoatamung: xoatamung
}

// LẤY TẤT MỘT THƯỞNG LƯƠNG
function timkiemmottamung(body){
    return tamungModel.find(
        {
            idnhanvien: body.idnhanvien ,_id: body.idtamung
        }
    )
        .then((tamung) => {
            return Promise.resolve(tamung);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

// TẠO MỚI LƯƠNG THƯƠNG
function taomoitamung(body){
    let tamung = new tamungModel(body);
    return tamung.save()
        .then((tamung) => {
            return nhanvienModel.findById(tamung.idnhanvien)
                .then((nhanvien) => {
                    nhanvien.tamungs.push(tamung._id);
                    return nhanvien.save()
                        .then(() => {
                            return Promise.resolve(tamung);
                        })
                })
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

// CHỈNH SỬA THƯỞNG LƯƠNG
function chinhsuatamung(body){
    let data = {
        "thangtamung" : body.thangtamung,
        "ngaytamung" : body.ngaytamung,
        "sotientamung" : body.sotientamung,
        "lydotamung" : body.lydotamung
    }
    return tamungModel.findOneAndUpdate({_id: body.idtamung, idnhanvien: body.idnhanvien}, data)
    .then((tamung) => {
        return Promise.resolve(tamung);
    })
    .catch((err) => {
        return Promise.reject(err);
    })
}

// XOÁ THƯỞNG LƯƠNG
function xoatamung(body){
    return tamungModel.findByIdAndRemove({_id: body.idtamung})
        .then((tamung) => {
            return Promise.resolve(tamung);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}
