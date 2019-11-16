const User = require('../models/user.model');
const controller = {
    verifyAuth: function (token) {
        return User.methods.findByToken(token);
    },
    index: function (token) {
        return this.verifyAuth(token).then(user => {
            if (user.roleId >= 2) {
                return User.findAll({attributes: ['first_name', 'last_name', 'email']}).then((result) => {
                    return result;
                });
            }
        });
    },
    show: function (token, id) {
        return this.verifyAuth(token).then(user => {
            let attributes = ['first_name', 'last_name', 'email', 'api_token'];
            if (id !== user.id && user.roleId < 3) {
                console.log("nope");
                return ;
            } else if (user.roleId >= 3) {
                console.log("nah");
                attributes = ['first_name', 'last_name', 'email'];
            }
            return User.findOne({
                where: {
                    id: id
                }, attributes: attributes
            }).then((result) => {
                return result;
            });
        });
    },
    events: function (token) {
        return this.verifyAuth(token).then(user => {
            return User.methods.events(user).then(events => {
                return events;
            });
        });
    },
    register: function (email, password) {
        return User.findOne({
            where: {email: email, password: password}
        }).then(result => {
            return User.methods.generateAuthToken(result);
        });
    }

};

module.exports = controller;
