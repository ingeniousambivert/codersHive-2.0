const {
	override,
	fixBabelImports,
	addLessLoader,
	addWebpackAlias,
} = require("customize-cra");
const { addReactRefresh } = require("customize-cra-react-refresh");
const path = require("path");
const overrides = require("./src/theme/overrides");

module.exports = override(
	addWebpackAlias({
		"@client": path.resolve(__dirname, "src/client"),
		"@components": path.resolve(__dirname, "src/components"),
		"@layouts": path.resolve(__dirname, "src/layouts"),
		"@store": path.resolve(__dirname, "src/store"),
		"@utils": path.resolve(__dirname, "src/utils"),
		"@pages": path.resolve(__dirname, "src/pages"),
		"@images": path.resolve(__dirname, "src/assets/images"),
	}),
	fixBabelImports("import", {
		libraryName: "antd",
		libraryDirectory: "es",
		style: true,
	}),
	addLessLoader({
		lessOptions: {
			javascriptEnabled: true,
			modifyVars: { ...overrides },
		},
	}),
	addReactRefresh()
);
