const chucvuModel = require('../model/chucvu.model');

module.exports = {
    getChucVus: getChucVus,
    createChucVu: createChucVu,
    deleteChucVu: deleteChucVu,
    getChucVu: getChucVu,
    updateChucVu: updateChucVu
}

function getChucVus(){
    return chucvuModel.find()
        .then((chucvu) => {
            return Promise.resolve(chucvu);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

function getChucVu(idchucvu){
    return chucvuModel.findById(idchucvu)
        .then((chucvu) => {
            return Promise.resolve(chucvu);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

function updateChucVu(bodyChucVu){
    idchucvu = bodyChucVu.idchucvu;
    let obj = {
        "tenchucvu": bodyChucVu.tenchucvu
    }
    return chucvuModel.findByIdAndUpdate(idchucvu, obj)
        .then((chucvu) => {
            return Promise.resolve(chucvu);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

function createChucVu(bodyChucVu){
    let newChucVu = new chucvuModel(bodyChucVu);
    return newChucVu.save()
        .then((chucvu) => {
            return Promise.resolve(chucvu);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

function deleteChucVu(idchucvu){
    return chucvuModel.findByIdAndRemove(idchucvu)
        .then((chucvu) => {
            return Promise.resolve(chucvu);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}