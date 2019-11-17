const sequelize = require('../common/sequelize').sequelize,
    DataTypes = require('../common/sequelize').DataTypes,
    jwt = require('jsonwebtoken'),
    Participant = require('./participant.model'),
    Event = require('./event.model');

const User = sequelize.define('users', {
    firstName: {
        type: DataTypes.STRING,
        field: 'first_name'
    },
    lastName: {
        type: DataTypes.STRING,
        field: 'last_name'
    },
    email: {
        type: DataTypes.STRING,
        field: 'email'
    },
    emailVerifiedAt: {
        type: DataTypes.DATE,
        field: 'email_verified_at'
    },
    password: {
        type: DataTypes.STRING,
        field: 'password'
    },
    apiToken: {
        type: DataTypes.STRING,
        field: 'api_token'
    },
    roleId: {
        type: DataTypes.BIGINT,
        field: 'role_id'
    },
    centerId: {
        type: DataTypes.BIGINT,
        field: 'center_id'
    },
    deletedAt: {
        type: DataTypes.DATE,
        field: 'deleted_at'
    },
    createdAt: {
        type: DataTypes.DATE,
        field: 'created_at'
    },
    updatedAt: {
        type: DataTypes.DATE,
        field: 'updated_at'
    }
},
{
    freezeTableName: true
});

User.belongsToMany(Event, { as: 'Participates', through: 'participants', foreignKey: 'user_id', otherKey: 'event_id'});
Event.belongsToMany(User, { as: 'Participants', through: 'participants', foreignKey: 'event_id', otherKey: 'user_id'});

User.methods = {};

User.methods.generateAuthToken = async user => {
    // Generate an auth token for the user
    let token = jwt.sign({id: user.id}, process.env.JWT_KEY);
    user.apiToken = token;
    user.save().then(() => {});
    return token;
};

User.methods.findByToken = async (token) => {
    // Search for a user by email and password.
    return await User.findOne({
        where: {
            apiToken: token
        }
    }).then(async user => {
        return user;
    });
};

User.methods.events = user => {
    return user.getParticipates({attributes: ['label', 'description', 'location', 'date', 'price']});
};

module.exports = User;
