const tinhthanhModel = require('../model/tinhthanh.model');

module.exports = {
    getTinhThanhs: getTinhThanhs,
    createTinhThanh: createTinhThanh,
    deleteTinhThanh: deleteTinhThanh,
    getTinhThanh: getTinhThanh,
    updateTinhThanh: updateTinhThanh
}

function getTinhThanhs(){
    return tinhthanhModel.find()
        .then((tinhthanh) => {
            return Promise.resolve(tinhthanh);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

function getTinhThanh(idtinhthanh){
    return tinhthanhModel.findById(idtinhthanh)
        .then((tinhthanh) => {
            return Promise.resolve(tinhthanh);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

function updateTinhThanh(bodyTinhthanh){
    idtinhthanh = bodyTinhthanh.idtinhthanh;
    let obj = {
        "tentinhthanh": bodyTinhthanh.tentinhthanh
    }
    return tinhthanhModel.findByIdAndUpdate(idtinhthanh, obj)
        .then((tinhthanh) => {
            return Promise.resolve(tinhthanh);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

function createTinhThanh(bodyTinhthanh){
    let newTinhThanh = new tinhthanhModel(bodyTinhthanh);
    return newTinhThanh.save()
        .then((tinhthanh) => {
            return Promise.resolve(tinhthanh);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

function deleteTinhThanh(idtinhthanh){
    return tinhthanhModel.findByIdAndRemove(idtinhthanh)
        .then((tinhthanh) => {
            return Promise.resolve(tinhthanh);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}