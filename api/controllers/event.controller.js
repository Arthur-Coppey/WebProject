const Model = require('../models/event.model');
const controller = {
    index: function () {
        return Model.findAll().then((result) => {
            return result;
        });
    },
    show: function (id) {
        return Model.findOne({
            where: {
                id: id
            }
        }).then((result) => {
            return result;
        });
    }
};

module.exports = controller;
