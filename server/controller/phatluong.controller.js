const phatluongModel = require('../model/phatluong.model');
const nhanvienModel = require('../model/nhanvien.model');

module.exports = {
    timkiemmotphatluong: timkiemmotphatluong,
    taomoiphatluong: taomoiphatluong,
    chinhsuaphatluong: chinhsuaphatluong,
    xoaphatluong: xoaphatluong
}

// LẤY TẤT MỘT THƯỞNG LƯƠNG
function timkiemmotphatluong(body){
    return phatluongModel.find(
        {
            idnhanvien: body.idnhanvien ,_id: body.idphatluong
        }
    )
        .then((phatluong) => {
            return Promise.resolve(phatluong);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

// TẠO MỚI LƯƠNG THƯƠNG
function taomoiphatluong(body){
    let phatluong = new phatluongModel(body);
    return phatluong.save()
        .then((phatluong) => {
            return nhanvienModel.findById(phatluong.idnhanvien)
                .then((nhanvien) => {
                    nhanvien.phatluongs.push(phatluong._id);
                    return nhanvien.save()
                        .then(() => {
                            return Promise.resolve(phatluong);
                        })
                })
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

// CHỈNH SỬA THƯỞNG LƯƠNG
function chinhsuaphatluong(body){
    let data = {
        "thangphat" : body.thangphat,
        "ngayphat" : body.ngayphat,
        "sotienphat" : body.sotienphat,
        "lydophat" : body.lydophat
    }
    return phatluongModel.findOneAndUpdate({_id: body.idphatluong, idnhanvien: body.idnhanvien}, data)
    .then((phatluong) => {
        return Promise.resolve(phatluong);
    })
    .catch((err) => {
        return Promise.reject(err);
    })
}

// XOÁ THƯỞNG LƯƠNG
function xoaphatluong(body){
    return phatluongModel.findByIdAndRemove({_id: body.idphatluong})
        .then((phatluong) => {
            return Promise.resolve(phatluong);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}
