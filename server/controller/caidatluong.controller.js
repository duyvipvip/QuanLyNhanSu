const caidatluongModel = require('../model/caidatluong.model');

module.exports = {
    getCaiDatLuong: getCaiDatLuong,
    updateCaidatLuong: updateCaidatLuong
}

function getCaiDatLuong(){
    return caidatluongModel.find()
        .then((caidatluong) => {
            return Promise.resolve(caidatluong);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

function updateCaidatLuong(bodyCaiDatLuong){
    return caidatluongModel.findOneAndUpdate({id: '5ad71f5b09ad3b6cb18f0048'}, bodyCaiDatLuong)
        .then((caidatluong) => {
            return Promise.resolve(caidatluong);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}