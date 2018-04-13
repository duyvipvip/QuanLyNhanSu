const mongoose = require("mongoose");
const nhanvienModel = require('../model/nhanvien.model');

const chamcongSchema = mongoose.Schema({
    idnhanvien: {
        type: mongoose.Schema.Types.ObjectId,
        ref: 'nhanvien'
    },
    time: {
        type: String,
    },
    
}, { collection: 'chamcong'});

chamcongSchema.post('remove', function(doc) {
    var deleteChamCong = doc;
    nhanvienModel.findOne({'_id':doc.idnhanvien})
        .then((data) => {
            data.chamcongs.pull(doc.time);
        })
});

module.exports = mongoose.model('chamcong', chamcongSchema);
