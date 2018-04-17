const caidatluongModel = require('../model/caidatluong.model');

module.exports = {
    getCaiDatLuong: getCaiDatLuong
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
    return caidatluongModel.findOneAndUpdate({id: '5ad59927b00e70aed0d4bd1d'}, bodyCaiDatLuong)
        .then((caidatluong) => {
            return Promise.resolve(caidatluong);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}