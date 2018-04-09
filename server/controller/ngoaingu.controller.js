const ngoainguModel = require('../model/ngoaingu.mode');

module.exports = {
    getNgoaiNgus: getNgoaiNgus
}

function getNgoaiNgus(){
    return ngoainguModel.find()
        .then((ngoaingu) => {
            return Promise.resolve(ngoaingu);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}