module.exports = {
	front: {
		style: {
			app: {
				mode: "production",
				output: { filename: 'app.min.css' },
				performance: {
					hints: false,
					maxEntrypointSize: 512000,
					maxAssetSize: 512000
				}
			},
		},
		script: {
			app: {
				mode: "production",
				output: { filename: 'app.min.js' },
				performance: {
					hints: false,
					maxEntrypointSize: 512000,
					maxAssetSize: 512000
				}
			},
			vendor: {
				mode: "production",
				output: { filename: 'vendor.min.js' },
				performance: {
					hints: false,
					maxEntrypointSize: 512000,
					maxAssetSize: 512000
				}
			}
		}
	},
	backoffice: {
		style: {
			app: {
				mode: "production",
				output: { filename: 'app-backoffice.min.css' },
				performance: {
					hints: false,
					maxEntrypointSize: 512000,
					maxAssetSize: 512000
				}
			},
		},
		script: {
			app: {
				mode: "production",
				output: { filename: 'app-backoffice.min.js' },
				performance: {
					hints: false,
					maxEntrypointSize: 512000,
					maxAssetSize: 512000
				}
			},
			vendor: {
				mode: "production",
				output: { filename: 'vendor-backoffice.min.js' },
				performance: {
					hints: false,
					maxEntrypointSize: 512000,
					maxAssetSize: 512000
				}
			}
		}
	}
};