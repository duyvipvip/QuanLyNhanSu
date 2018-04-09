const hedaotaoModel = require('../model/hedaotao.model');

module.exports = {
    getHeDaoTaos: getHeDaoTaos,
    createHeDaoTao: createHeDaoTao,
    deleteHeDaoTao: deleteHeDaoTao,
    getHeDaoTao: getHeDaoTao,
    updateHeDaoTao: updateHeDaoTao
}

function getHeDaoTaos(){
    return hedaotaoModel.find()
        .then((hedaotao) => {
            return Promise.resolve(hedaotao);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

function getHeDaoTao(idhedaotao){
    return hedaotaoModel.findById(idhedaotao)
        .then((hedaotao) => {
            return Promise.resolve(hedaotao);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

function updateHeDaoTao(bodyHeDaoTao){
    idhedaotao = bodyHeDaoTao.idhedaotao;
    let obj = {
        "tenhedaotao": bodyHeDaoTao.tenhedaotao
    }
    return hedaotaoModel.findByIdAndUpdate(idhedaotao, obj)
        .then((hedaotao) => {
            return Promise.resolve(hedaotao);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

function createHeDaoTao(bodyHeDaoTao){
    let newHeDaoTao = new hedaotaoModel(bodyHeDaoTao);
    return newHeDaoTao.save()
        .then((hedaotao) => {
            return Promise.resolve(hedaotao);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

function deleteHeDaoTao(idHeDaoTao){
    return hedaotaoModel.findByIdAndRemove(idHeDaoTao)
        .then((hedaotao) => {
            return Promise.resolve(hedaotao);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}