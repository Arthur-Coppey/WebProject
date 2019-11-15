const sequelize = require('../common/sequelize').sequelize,
    DataTypes = require('../common/sequelize').DataTypes,
    jwt = require('jsonwebtoken');

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

User.methods = {};

User.methods.generateAuthToken = async user => {
    // Generate an auth token for the user
    console.log(this);
    return jwt.sign({id: user.id}, process.env.JWT_KEY);
};

User.methods.findByCredentials = async (email, password) => {
    // Search for a user by email and password.
    await User.findOne({
        where: {
            email: email
        }
    }).then(async user => {
        if (!user) {
            throw new Error({ error: 'Invalid login credentials' })
        }
        const isPasswordMatch = await bcrypt.compare(password, user.password);
        if (!isPasswordMatch) {
            throw new Error({ error: 'Invalid login credentials' })
        }
    });

    return user
};

module.exports = User;
