//it was necessary to change this in order to make webpack/eslint get esnext syntax
module.exports = {
    "extends": "eslint:recommended",
    "parserOptions": {
        "ecmaVersion": 2017,
        "sourceType": "module",
        "allowImportExportEverywhere": true
    },

    "env": {
        "es6": true,
        "browser": true,
        "node": true,
    }
}
