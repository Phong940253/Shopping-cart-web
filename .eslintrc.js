module.exports = {
  'env': {
    'browser': true,
    'commonjs': true,
    'es2021': true,
  },
  'extends': [
    'google',
  ],
  'parserOptions': {
    'ecmaVersion': 12,
  },
  'rules': {
    'quotes': [2, 'single', 'avoid-escape'],
    'max-len': ['error', {'code': 120}],
    'require-jsdoc': 0,
  },
};
