const Model = require('../models/user.model');
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
    },
    register: function (email, password) {
        return Model.findOne({
            where: {email: email, password: password}
        }).then(result => {
            return Model.methods.generateAuthToken(result);
        });
    }
};

module.exports = controller;
