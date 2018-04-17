const chamcongModel = require('../model/chamcong.model');
const nhanvienModel = require('../model/nhanvien.model');

module.exports = {
    getChamCongs: getChamCongs,
    createChamCong: createChamCong,
    thucHienChamCong: thucHienChamCong,
    deleteChamCong: deleteChamCong,
}

function getChamCongs() {
    return chamcongModel.find()
        .then((chamcong) => {
            return Promise.resolve(chamcong);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

function thucHienChamCong(bodyChamCong) {
    return chamcongModel.find({ idnhanvien: bodyChamCong.idnhanvien, time: bodyChamCong.time })
        .then((dschamcong) => {

            if (dschamcong.length != 0) {
                return chamcongModel.findOneAndRemove({ idnhanvien: bodyChamCong.idnhanvien, time: bodyChamCong.time })
                    .then((chamcong) => {
                        return nhanvienModel.findOne({'_id':chamcong.idnhanvien})
                            .then((data) => {
                                data.chamcongs.pull(chamcong._id);
                                return data.save().then(() => {
                                    return Promise.resolve(chamcong);
                                })
                            })
                    })
                    .catch((err) => {
                        return Promise.reject(err);
                    })
                // return chamcongModel.findOne({idnhanvien: bodyChamCong.idnhanvien, time: bodyChamCong.time}, function (err, project) {
                //     return project.remove(function(err){
                //         if(!err) {
                //         } 
                //         return Promise.resolve('d3d');
                //       });  
                // });
            } else {
                let objchamcong = new chamcongModel(bodyChamCong);
                return objchamcong.save()
                    .then((chamcong) => {
                        return nhanvienModel.findById(chamcong.idnhanvien)
                            .then((nhanvien) => {
                                nhanvien.chamcongs.push(chamcong._id);
                                return nhanvien.save()
                                    .then(() => {
                                        return Promise.resolve(chamcong);
                                    })
                            })
                    })
                    .catch((err) => {
                        return Promise.reject(err);
                    })
            }
        })
}

function createChamCong(bodyChamCong) {
    let chamcong = new thuongluongModel(bodyChamCong);
    return chamcong.save()
        .then((chamcong) => {
            return nhanvienModel.findById(chamcong.idnhanvien)
                .then((nhanvien) => {
                    nhanvien.chamcongs.push(chamcong._id);
                    return nhanvien.save()
                        .then(() => {
                            return Promise.resolve(chamcong);
                        })
                })
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}

function deleteChamCong(idchamcong) {
    return chamcongModel.findByIdAndRemove(idchamcong)
        .then((chamcong) => {
            return Promise.resolve(chamcong);
        })
        .catch((err) => {
            return Promise.reject(err);
        })
}