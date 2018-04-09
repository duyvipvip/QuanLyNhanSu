const dantocModel = require('../model/dantoc.model');

module.exports = {
    getDanTocs: getDanTocs,
    createDanToc: createDanToc,
    deleteDanToc: deleteDanToc,
    getDanToc: getDanToc,
    updateDanToc: updateDanToc
}

function getDanTocs(){
    return dantocModel.find()
        .then((dantoc) => {
            return Promise.resolve(dantoc);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

function getDanToc(idDanToc){
    return dantocModel.findById(idDanToc)
        .then((DanToc) => {
            return Promise.resolve(DanToc);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

function updateDanToc(bodyDanToc){
    iddantoc = bodyDanToc.iddantoc;
    let obj = {
        "tendantoc": bodyDanToc.tendantoc
    }
    return dantocModel.findByIdAndUpdate(iddantoc, obj)
        .then((DanToc) => {
            return Promise.resolve(DanToc);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

function createDanToc(bodyDanToc){
    let newDanToc = new dantocModel(bodyDanToc);
    return newDanToc.save()
        .then((DanToc) => {
            return Promise.resolve(DanToc);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

function deleteDanToc(idDanToc){
    return dantocModel.findByIdAndRemove(idDanToc)
        .then((DanToc) => {
            return Promise.resolve(DanToc);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}