-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 28, 2023 at 10:12 PM
-- Server version: 8.0.26
-- PHP Version: 8.2.0

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `VsWgp`
--

--
-- Dumping data for table `VSAPI_RefreshTokens`
--

INSERT INTO `VSAPI_RefreshTokens` (`id`, `refresh_token`, `username`, `valid`) VALUES
(1, '54100efad57fed66755c6389b19348a1ff9190eb0c9a92f344e70c14bd137ca42c4a59465fbe0bccc6104c37a6ca9c9fef2f21f1965d1ea270cad3638b13f687', 'admin', '2023-03-14 19:13:07'),
(2, 'f84d2125c8b91b5ac599586dbd6eaad4aa32f193c815e03da6b7822508705efbf01229741f36a75cdbddc61fd49a43b2640087fa1fc6ddf0056117dd0d7f5b6c', 'admin', '2023-03-16 13:31:01'),
(3, '27e3d7621dccbba789b58771c4dcb59327d20b3bd8d9ff81f35113651b28994d916fe9bad8600b4e62a7d3adc5ffac816082e58930d114b08110ac2d56f482b4', 'admin', '2023-03-16 14:15:36'),
(4, 'eb2a61792e4e50d4ab024022360300c27dfeb14ae73c583d3a956e852ce7dcf8c1822fb619cb2f24ae268a4a585756e45cc17ad950a8d5df9fdb9951a5a03ec9', 'admin', '2023-03-16 15:36:59'),
(5, 'fa54a90159329e2e2beca83634031e5178ba928f521321f8d2c7dfdbaaf6f9f80cb29c77d244b9a9fdb50097987a42294d6ab9f5eb8eb7b26fef6e509da445f8', 'admin', '2023-03-16 17:02:40'),
(6, 'e9a291dda34a17e38988143a13ef4d856b1622e8ed1c1b58c29fd784f7de276f423b95edffa10ecc18f9828f128273caa9c3b5e1c2c692ca74fbc311f8942573', 'admin', '2023-03-16 17:46:40'),
(7, 'fa5f32e79caca4edc6f1fa2909fe1c30816d2f73075fe4e723713b92dba5dfbaa2ad172ba340ce1fefaa2d3912e6fb0d7ec57cca488a7da3faaebd77bb799e76', 'admin', '2023-03-16 18:07:16'),
(8, '477e5ebcc89c70acbbe5741698f624b4923b22840bace0af974188fc90f228e499aa7e0b4aa87b957627b0d4d1b51023012640f738fba6017301bf05c003bdee', 'admin', '2023-03-16 21:53:12'),
(9, '3edd056ae4c7156ca745ed30648d79236637d0a57a2a1496a7636130c350baf49c898d1d46a60693725de749a4e87bf274a3a84144cae6cbf0d54180fdf5d2a5', 'admin', '2023-03-16 22:03:56'),
(10, '7abf5aba438c717657ba2beb23baf92f49f269511d94acf7326772f72b8635c11daa570e84e1d3471b5ab1ef5871566bdac05209ad1742e14b7d15b658bd496a', 'admin', '2023-03-16 22:09:33'),
(11, '8dad948a2d6c243c6de695270481b20a46ca1afa21343e91f2b3180395b16a5722a033b3bad80f1d79932477870d0c9231f12e0d8741c1b99569274fc39a4af8', 'admin', '2023-03-17 19:40:35'),
(12, '4044b6a1739ff31bb18f193337158c0b31ea5351ebbafdd9f5e0d9435c8d52b6b3c871edcb4d1cdc08dfa36a06712a65b516d29c53b7b15e62629d25da60ac44', 'admin', '2023-03-18 01:12:46'),
(13, 'faff245a952777f3edf329912c41e3e791875bbe2e044a885a23bb9fb24a4e8c44cb42f0657d3902a688eac65734d64ab97974ae13736e7f3276a50a9bfb0c83', 'admin', '2023-03-18 09:44:17'),
(14, '6a0e053dfa97f32e536368b4b18ac3ea6af04f79b8349e237ebbb482e1c212dd10b287d0648d0f300bc69d40256416ca8c53641372027b1e6248ead0f7d4d885', 'admin', '2023-03-18 11:42:02'),
(15, '530923e1812cbdb57de43e7dfbb3172eed4fef8d33cc7013dc61181098670df5659ea536bf9c247f0e4c4923e70a411640fcc2f4219d73b60c21b94f841e326f', 'admin', '2023-03-18 12:35:08'),
(16, '3dfd564f6ef1c514542a8c3da5705ef9e99180c7f3d251795b3c86ebf1bac6a92af1605a79bfa280b25c605ee9a7abab620901a09d546d03f006b4386e48592d', 'admin', '2023-03-18 14:36:46'),
(17, '6442f9a9eec8f36bdeaf30e2caa6378198068ebb242ce6a10d65e4489aaebe21adedd5275b2509fcdcdc7157533c590fb2ea14fd0d7a74957ce0ef20f2d085da', 'admin', '2023-03-19 05:35:36'),
(18, 'd9b8e2f2acdd6f6de51fd0cf7cd9ce8ae94db6b655707cf95abe88a75fc4f05c64791df1333ee9e16cdb114573e3c24c28cb5c34dcac46ad91b432a66a35ff26', 'admin', '2023-03-19 05:47:55'),
(19, '8523c00ffa3cd8741294fe4e8e744c08c4238a769e92725cd7a9486f1e0ca5c22b535d554d7a77894d3f43f87a695be547b56855c6780abfda6ad8a8d3a786f0', 'admin', '2023-03-19 09:46:00'),
(20, '84c55649ca3da3ddcbd86021d5e95662758263d6859bfe9cf299f0c4f1cd9e40316a06679643eebe78bc3ab9fa37d78e3272f89724b91405d4c0f753826fe8f5', 'admin', '2023-03-19 09:51:04'),
(21, 'f634d11ab1006cb89c9be6927add7be290f0ae76cd6dccedefbe267ef1b03779610e1d5649152ce3c57986b6f9dec10d0ac5f66db16b251d33e89f5ab5498a69', 'admin', '2023-03-19 09:51:45'),
(22, 'c034ac58132a52271c46960b1f71e0f854e272f1fdded2bc813b3ce2aa223854b9ccfb962b60c8159261431d352ec4499cb7156a18f0c6f644a751408e7b1586', 'admin', '2023-03-19 10:10:37'),
(23, 'a59636d0b461c1489dc6acdca4505c2d7efdae2cf80ee3d615750c009116b4e80f706b00106b383a456533aa66c35892ec7120ec11947522124ae359d09a798a', 'admin', '2023-03-19 10:15:18'),
(24, '5a0a8e54b9022a6f6a094ffd449286ff3f53be59bd9e4dcbdefa5f673583bedec6121ecc12ba6e477de91ceb1a8125fe6ea505daa8c4e1fd32d35e82e9761bb9', 'admin', '2023-03-19 10:16:50'),
(25, 'a09a30932daa9ab0e44ab2e81abe3eb0ef58a8e1b5dba8b3917580973cc86e93758c9046e8a5cc507d8d268ca78efd989926c9d55c06e260401b5a35b68df09e', 'admin', '2023-03-19 10:17:38'),
(26, '822e11697013d49d5c67220345dd6aebbd82c6612d30b9c52b57d3c8ce30de52b691eadb85e970af34d34f40e601e58d5740aaf884ee7f2ad04474a189d0eb9d', 'admin', '2023-03-19 10:18:33'),
(27, 'f3b3772fcc3280c0f3760d13d7442fc0fc16b8aabcafa93ad0d28c12e072512c7c57970dbbc6d7618dd6ee9a90fff0688a70759c808a734f23d286252e9e0e88', 'admin', '2023-03-19 10:19:43'),
(28, 'e86c3889894ed0aeb48b65e373dc7240fadee5c184297073a82acbc1621a06aeccc16c104d66bef8b97a448d5a8fad1e37ea8334900223de86af5956ff4396ec', 'admin', '2023-03-19 10:29:16'),
(29, '1f5be1dd81524df2647bcac199ca8e8ec1c601f7ada5f9af28dadf30466a173eef359b12c43c3231d5409af52780dc275a9087abeffa4d3454eb2d59f371c205', 'admin', '2023-03-19 10:30:14'),
(30, '50117053739e57436ad2fab707ac9d5b47b58319b1b3090ce8bdc5caeb0590aace55daa563367f748bbcb508b49f875ba43f575e9f113388d6f4bc9ca768f373', 'admin', '2023-03-19 10:33:01'),
(31, '035daab97795c1a85b1dd0d313b3a461f205874d632b24d17f507e9fca6eb8ccf0207cf9358e037fcfb2d8b691e6077e10d68ed1380c0c207269bd4f7ee331f7', 'admin', '2023-03-19 10:34:01'),
(32, 'c0a5f6fadd749b013c6afd5b7f58610d95036deb9a9b524e936c1591fe3d8d87b86e4b674000d1476b4d96cb477dc26082c0746c263a8c02dd43946103933fa0', 'admin', '2023-03-19 10:38:46'),
(33, '1e37f162cbff379976d6612985f75d7fc6c136154dfd26daea8526dd657f3ce981881b5a6b83ebed762543cdc4fba7a0e307af1f5238bd836e262c69f6a4a15c', 'admin', '2023-03-19 10:40:23'),
(34, 'fc6e1d5407c89f97c7a8f9b823a367e39e97671b04a84faed9d48882724af11e4724e6c9ab21712781592189fd92c6704eaf7418b31a6cf2d715879596c77a26', 'admin', '2023-03-19 10:41:08'),
(35, '4f6c40d87443a047dbdfbfa607f0923122b1853d75611d0b295cdea98aad8f68b2b2f7deff4e97520510d271fe2aa76084715430f9473f2d5a11ecca508aca81', 'admin', '2023-03-19 10:43:26'),
(36, '0a9650b964279bf659a866dc5336b15dc07e35286c75561b87f34f3e08f154c4d34b1e41c18fddf2a4ee9079e6c8778738f5e7b4ea5f58e3d8e08657e3644419', 'admin', '2023-03-19 10:46:09'),
(37, 'f331742a27dfa36bc883af62c8ac18465b8d58c2fed6e03bee0f01a4656e58fa579abb692a54bd936c28be2495b62aea7916dc37085e0ee0fa6874ca73f0b625', 'admin', '2023-03-19 10:48:58'),
(38, '895653991918bb9785b1306b0ed085c0338d7a620722fb85c6ab1ef562c8ee41612d2e8b4608d885a94dd2e8f109ce5ceef4ff1033aafedf5843f2de95b9fed7', 'admin', '2023-03-19 10:53:17'),
(39, '41401287742af898ed3cedac74002d14da570be39c6ab4bfd3c0fd9a61ecadcf3c09aea1a8d1ed6f0bf3d82e95049aef65fde89b5fad6a2c760c6a723b49713a', 'admin', '2023-03-19 10:55:47'),
(40, '81d8200278aed0c71c92523254e34a96c1d287a8a7068998ad63cea3277498235f3053a5955e7de6f5f7a871b499bad742dde25119ff9548d512981df5d94735', 'admin', '2023-03-19 11:02:03'),
(41, '0844ab03cc03c6d3d2039ad4f84a706496f8386abc366f3f99a2bdb1db569855998c183e3239b8b124fa650cbf11e50b00cf44f76c9e0f9ec35fd6aaea3f55a0', 'admin', '2023-03-19 11:02:29'),
(42, '7461597b54b449b59252de0b4a553f26c08f9442fc369557a4d50dfaf67256df55df4a1254ab9327de54ad19f63f1fee37f4bb55b9daf5130c77064d2788ed42', 'admin', '2023-03-19 11:05:14'),
(43, '553808a83a8ae974bedd9d191d248815de2d7fe974731b0dd0c370d27917e6656fd7abd5457dd4022cee06d602b3aa27f1438a3863fc6c33ca01d96aefaab24a', 'admin', '2023-03-19 11:08:40'),
(44, 'c00093ba9f141b086f797e43182d87c219091d953b2f0694fdb30074500208d5bc4f8b8db173a917f598d234ed791aa5a04291e6f44266e3e848f150bade6f71', 'admin', '2023-03-19 11:11:38'),
(45, '38e9d33d08b76ad7420c24d90870baaf055e545d762bb52d9bc0870bc7c402d45369a5e2be74c3d7895228ce4af1b2ea1fe53a85af6552ac58be57538a995597', 'admin', '2023-03-19 11:13:56'),
(46, 'dbf0dc66c4f0e0af33ca152544d8ca67397a73514bb2fd380ffe2884d7f21ae6b8bc86a7cb69db6e7108040e43594b3f3753b390af58af776521ee8b570b6ca8', 'admin', '2023-03-19 11:19:35'),
(47, '8a02787eac0218109309036026676de8c48061b7a8b6795b102bc127af3825d1c429d58e4217c626b7a639dabfa652f65d398ba8141547225fc862bc98e919a6', 'admin', '2023-03-19 11:23:50'),
(48, '0ec5ee0134d4d3d83db85704957f10d0d47c3a7a43da8e00cf2431266705d4587f230c1398e639c1cbbab4cf1e9e6ce87e3458fb2610d8252d49df159ba453f9', 'admin', '2023-03-19 11:29:02'),
(49, 'ab02c9c3b3fade8b4ffd136ebd4951a9f3203ec558e31412c7267ad44aa31a66914658907dc3d35d5b91334a9fdb8fc699e242fd1a15fbc185813d755adb1291', 'admin', '2023-03-19 11:30:19'),
(50, 'e6964bd5de65bdbebdfc08335f70c3d30b53c450b8555f8698187c7c31d4f56757ae7d2cc54e99e96b0580b976ad6da4fd4b43a22b8ef9b805215b5bb7fcbc60', 'admin', '2023-03-19 11:31:46'),
(51, 'b02a64ac8750c2cfad65126c8af18f4a95467102daf7a2337dd62deb87cde2d2658e9c39ae9b9c4fae04a415cec0c93c957b5f61ac6284fcc6dc777a03632dca', 'admin', '2023-03-19 11:34:09'),
(52, 'e49995ace420edcbdb3d8cbb655c29a1a35f48e05dc22bc5ce22810dad00155145ebcaf547fc8d1cfcf67fe6d5abfc73b1efd8f6c06a3b4bcaece624bf94d3ae', 'admin', '2023-03-19 11:35:15'),
(53, 'cbf7a76c1a498e72d16623431be6c4fad94566470455a48cea9d50b193a352d2484ff3957a9244b9e276126089ca8d76d3192b30e5e0d33218b6d7bd94859125', 'admin', '2023-03-19 11:37:42'),
(54, 'ec99d15cf1db177c6bae688f9f6b738a4ce151967bed26e5ea056f4b25dbebba1053467a7cde3db34302055c2b9d977398340d0fe18f06ba8b556296dc7f0b8a', 'admin', '2023-03-19 11:40:50'),
(55, 'c8e2a158da3fc026380d0c59e03214dedb06e6c888c42bfa035d014e5ae0199612d5b9d31c9018014b9974471ee229e9cb242c5aa83e048e03dedcdcf68af01c', 'admin', '2023-03-19 11:42:27'),
(56, '3fd6c75105bfa3312709d1ed13abacae074fedd17dd3f13d972337effcbb1b6cb0b066902b178acd7e673e0f567c83a50d8a8f68725b117e71fdd1c8be0e738b', 'admin', '2023-03-19 11:43:41'),
(57, '627cca2533d675e24918014351020f56d6a4e713f9a9b886edcd4c4a53d05dd7402212052f1b9ead6fbb7613b29326be4fbd681d453fdea19e4aef2341efe399', 'admin', '2023-03-19 11:50:47'),
(58, '66eb27c44d4ebd74d27b77c7cca8922d24835ba30b05201121b2306ce6445051367656a4e02ab423c641a94c47b33773f498a15a691c27a01fb87dc031fd7552', 'admin', '2023-03-19 11:53:18'),
(59, '2ff47121a2576147fe95b2f50b239f66973d597f996f6a04a17fd177e12d1e45af7a7cfb888194de0386e24d8fc23d0975ba3b27fb22353fd6c24622c21b41dc', 'admin', '2023-03-19 12:02:53'),
(60, '0dc245c5e71a5c5a22f2c5b938fb823b05880b080b90896711c1baa0aa3689ca17a43870c6b301a20b1032a4d900a416cee2ddd920b2741b0417b7daa8b7367c', 'admin', '2023-03-19 12:05:01'),
(61, 'e2208c90c76418a5fe1cc9116f34ccbb168f4c5bc0dc1073b31dfd953ebc99caf238a5a197e57d019d14a641a31101c05e9acb664513390b1179893cbd12f89c', 'admin', '2023-03-19 12:07:12'),
(62, 'c87f3622fa768643deb0a54aed031bd28c374303d4b18dafedd95604dbbd9c0d1a0d37efe3026d4be4bb0cabd9828e82a93319c6d8a55e87edd8bbe80a80c9ed', 'admin', '2023-03-19 12:08:59'),
(63, '9fae6357659a34a6150461110ea6bcfb2ba027f00404cc6afc659b4f6c0c902302bfb5360e58b50e285612c2e6e4130bdbf8581762702125688e84353c2a8fa1', 'admin', '2023-03-19 12:10:14'),
(64, '00fcd16e93cade7c73407a8f64ec5f7dae142017b80ce5f07ce0dc28ab5da3f05003f54a90a6ce747dd4d55ddd4140ba48e3ef638797ba1dcb46a3e99122f73f', 'admin', '2023-03-19 12:12:01'),
(65, '626a71fe7077337a0306b07fe77dfbce4bfa12ad9e09c1876eb12cf55132d6a1b4975a4c2062202558f2857a835b1c787e3a2c87f5e6c6bb36f8a54ce50abb59', 'admin', '2023-03-19 12:13:13'),
(66, 'd6766293777c903c6b0797762e08dad74a567f7029c0f42dea40158c458aeb85b35f557ec9a6803811ac341a16a099477298eba4aab9ead9754f3629c8d5ae69', 'admin', '2023-03-19 12:15:54'),
(67, 'bee6398ecf39aca446373d4ce9a58c7302e3e03013a28a3e00aa2a9994bb12faa328d3728cf3718341ef0d3c8656c099e2dbcaa10907ac0e9f41cb11ce376965', 'admin', '2023-03-19 12:18:32'),
(68, 'e3ce8c2e318be53961cb8b3cf2683aec464e24a2aabee75ce45909c5fbcdad1378f58c867a1c180df9ad5102147d6a81a4f1b92e9742e92e4649bca0bd39c973', 'admin', '2023-03-19 12:23:11'),
(69, '3b3117e070bfa02e127c01729e6296db2fb9a0f41e1deaec4f287a29f0f4a9d41da365299b9977ae5957813cc5ed76cae37d7b66ff2f229669c5d15fff9d3df4', 'admin', '2023-03-19 12:24:28'),
(70, '848061440a91037af78d5a8418ba2bd5497df8292bd4097e2d636c9f3b4e8d720a55ababeb1fb95dcf89a927306b05e14a13ab094a9ea15c1301c215a304d450', 'admin', '2023-03-19 13:08:07'),
(71, '0caa3e769bdc8d89c658ef41b031bb225d93837347006186fee7c1a93705afce96bc00e95f31f99639ee0d53ab2508c8c900d609b3016a13531b5814ed82ffd7', 'admin', '2023-03-19 13:10:23'),
(72, '089400eb4d9e09af1f9a0943b835233d0c384437ce4dd9cbac9b2349b16e21c6d17e1de82d866d5e1276a70c8b877d943cf31895c4e11256733afa542b8f951e', 'admin', '2023-03-19 13:12:07'),
(73, 'a362a9bf2c76f5f63c10679ed2998511fbca154a790bf086d52c03f09e52a8039a121aa031de6740e6ebd0c9af5724b1aa1290c31ed2435c6d5bb601df3351fe', 'admin', '2023-03-19 13:14:07'),
(74, '5da2edcc43cf57784c92da880e1cc86d1c743df6620943c963988d6d65d82b4a59c73d3f78972b11f382572797a16c164fdf47f706a98ca0d83de4afa0fb9b56', 'admin', '2023-03-19 13:15:00'),
(75, 'e15412d2d1357cb7eff630cbef6d46a6b150bb1182b779b249b0a59635562dd37d982584cfbe7908501bfd39119131604150842ecd71e57e83214b5b0baa2a7f', 'admin', '2023-03-19 13:19:28'),
(76, '370e678eae3f6ced06d3ebca14666026a566a23ea17b265bcd40307c0475796ecc8af0035af9cd9c4bc9627e0da2eda2ef86909f92a82a3dd3b37c4d03e2687c', 'admin', '2023-03-19 13:22:39'),
(77, '46b98731459acd79c905bd288d04c7e4d8c58ab574c718e3df25b9fed0533b523c1152c4c767061a3347271e88f27deb0a23af98fb4dac11ff6e5a745d648593', 'admin', '2023-03-19 13:24:56'),
(78, '2a19976a8f0883a6f719d217a70e672669399aeb79ccf352505b2d2a1ad58ac79521a8dcd54f6bb2bcba346e30a55746d6fe2b4949b4766f092d4976cff04ab0', 'admin', '2023-03-19 13:30:12'),
(79, 'ddc49d7766ca9c17a4f653734ebddbae5c38a10afc5f8932c6ea55c653b2bb0c7ba8898064e4b80611a4283308cd387b33a2f79846ffbc07c795162693e5aa58', 'admin', '2023-03-22 12:16:52'),
(80, '65701ac849fc4a11d0d3c3ab322b727397ca3d0afd3b9e82b23fc7c855e4d4c283112d4209aa32f9722c1a5c6c330ead5a9c8d599aa448cf977c6e2705208e68', 'admin', '2023-03-26 21:08:46'),
(81, 'eb4c498f1f50efb0f7c99eb0f7727af220d8515c1652427dc3ec195a75d1788bf0b12074e601d163165934b30e6e7f165ff0f8259a326a6c54d93620770678c7', 'admin', '2023-03-26 22:54:16'),
(82, 'b82eda1084dd92fe0c3a4e82f16b6cdb90330246b2e2d12506f6e0f3123e8059196a5cd503db999f1acd2bcdf8fcaca98eebacec68f085ec1ee37fc37ab785d0', 'admin', '2023-03-27 19:27:58'),
(83, '82ce9a9cf5512ea6d58f0c7534a55486fb19d9be8bc0f2998d27d5064bb7255afa88425fe905c93e9213456b09c92bce583390d29e6be782a4ded9ab08b41bc9', 'admin', '2023-03-27 21:03:59'),
(84, '91e6b776f64352507c4612df4ece32e38d09118f51a06561addfc4b811d0b2a0cb671e74eedba87a4ce24cca5b315f8385fb185b87849e286e69851634c44845', 'admin', '2023-03-28 09:16:52'),
(85, '6449b405211d167867207a1ebff087ee7f8b64c471cb61d32d29b81c8b95154f6d0e31cea8414dcd5f87c7a74971aebd1e780c4fee75060d002807b27da3e787', 'admin', '2023-03-28 10:29:21'),
(86, 'e5d256ff0c304bcd92d746b328f74d45d4b845dc8722cdccce7378580696992361a5b4d1e1e136f748406ed101e7b20cd29aeb31bea3aa8e92fe46fe5b6c5327', 'admin', '2023-03-28 11:40:43'),
(87, 'a85cf5cf7901aa820d53c417a6801375b2c0c967bbcdf0374d6fa4952e7ce9d6894e89d44b85870582f3e4bdf806c822bc2248a6944faadbe72598b216a78b6f', 'admin', '2023-03-28 12:00:47'),
(88, 'afc68dd17af8365ff31c55608a9db4710789c561456a638392fa3f9984bc438eb9975a4a8544f32459024dbc0f3bf42aa48afc321c4095c5262427f51ff8c271', 'admin', '2023-03-28 14:37:20'),
(89, 'af0ba7f9e37a480f47813a16a47ba1104e9f0c048142d7ed01654bba498fe02e6bab8d26dba6cd033c871ea4cb437670a32b6e23647e8c60e3e26788e7da259f', 'admin', '2023-03-28 14:38:04'),
(90, '2cdb6546b9a5978ecfe38da8295dfdf52e2797b9fff6bce91226817556e750e34966c99a97305707d36d12ca97619b7770eb1fe595e6a370868832d7cf323172', 'admin', '2023-03-28 14:40:10'),
(91, 'b366016b192119c7e031114adafe241dc1ea77bee764bf1f8cc41616ba8735c0960659979b2581db67d19ba308f789ebc98dd5ced5fec8c066f36144b704f17a', 'admin', '2023-03-28 14:52:07'),
(92, '393b55ec4a85b19db62049b49a60105e507d2f2f99253b4e998ad9e43ad7abd3238b7832ff56cae3a4bbda27764c14d2ab19e408fda916a2caf92e9546197e00', 'admin', '2023-03-28 14:53:32'),
(93, '0db2b8c7641e361c9d6201bee7c28158913774ae8f156cc4f8d1446ff9f5d646bbd9dd8d7507a1a74fa6f984d9696568dd0bbe88ec18014b1cd4d65842920da8', 'admin', '2023-03-28 14:55:57'),
(94, 'b151c10d0ff01eee9239fa674ca18e09d7e354ffb033e0fdd6432018ab5140e1fd30701683352954549a17af3892276333352016a1450fa410772c5e0f8513cc', 'admin', '2023-03-28 14:56:46'),
(95, '2dc5378074b29ae1e06674e65e1cdd5897b0483f234b9ac55803af98398e4bd53596684896cc905d88954ae217a0a2d0df2b765df979e964c2e5fa035a6d7035', 'admin', '2023-03-28 14:59:34'),
(96, 'eaca85514d56b5c34b08abe862bc3d28f44a396ef6f85625c49b1f12fb1bc4f595c897c9e32e0bda1484df7bfed67809cd7a3c9bad96ddbdb2df08cdcb539b94', 'admin', '2023-03-28 15:05:18'),
(97, '2a73ff65e5a6e21fe4eee16a5ca0d10899baad22c814a8280a52cff27a0b7c702d0cd69adbe9273ef27d9ebdbf30beb6f99701bcb9b45cb17701c8af0c59e925', 'admin', '2023-03-28 15:11:43'),
(98, 'a262a924720c3b52c76fbd09d7af86e04349eedd7f4e2b4cca3265f0f868501a5e7660154b40ba0d01f5ca3382ae77d6ce8004f1e1b45e096572b1938004a0a9', 'admin', '2023-03-28 15:13:24'),
(99, 'd984dc8be489c6b2312907e20a8ebb9c3e331993e1912a09c697feb5dead734a8e201a03910ea256eaed0dbf73adddf48577243de03b6ebe7c68ab9425e4f58c', 'admin', '2023-03-28 16:19:02'),
(100, 'db2ff046e812146512846a1e7fa9b34bed0cf35c92c936dea06bea06542dfc62cfec3ea7e558f11ace2840aba3167f5bde47c1baafd7042ce2ae53ac65060ec7', 'admin', '2023-03-28 16:51:24'),
(101, 'dba2e71f07c2c4d2748ecc4fc9cef14e3dae2b16d89a43af25b6134d79e7d3d2b1ffaec679604a7b9186c87c702d0e294e224dac73007f8ac55e9405cd0a80f1', 'admin', '2023-03-28 17:37:20'),
(102, '4615cf543881962765cedaa04242e562403572751c8609c748d006bc5b7dbdff21dce4b2858bfc6ef0ea8b8e2d283e53bbb4a525d09ccc99515b06e44705d3e4', 'admin', '2023-03-28 17:54:25'),
(103, '908f468909b4170d9a92b9feb3e46a32e201dffd0c59452ad152c60f274c1a8683afa9f012e0c776d7273984e0d1feddd9a05739289bb37d612d3bee336e1bb0', 'admin', '2023-03-28 19:46:00'),
(104, '221ef1a959a4f84a2b73c9df6b74eb9cebc17875d75f3907b8dc5f9afe66b3207b4b15be1a3dc287f91b44e5df9e6f47285c43b8ac6b9d60bd25ddafd45364ca', 'admin', '2023-03-28 20:47:50'),
(105, '34c3dd40eca64839110fa1de5ff87357a71528fb7082f08ded06a4f79524133747ce5e8411a70a10302ea53990dbf622e5a18e0c6cd7a74ee8d8507bd03c2bb8', 'admin', '2023-03-28 22:54:11'),
(106, 'd28dfbfc6cb5a70e35345a18ae35cd60c93eda304703d3fe3bc469687b81d50239fe0d961d41cba2bcc4aadb10b9c986cfefc98f4eae87ea5ed6074be626360f', 'admin', '2023-03-29 12:09:27'),
(107, '28b835e59c68000cb239f906c01343fdcf5b59b699cc2930f89f97cd9d2d05a46cbc2c52e3e67712b75a3c42eb8d25cd82e0aa16da3954a3d5b4a050a1a144fa', 'admin', '2023-03-29 13:45:31'),
(108, '2a467194e3979e687429f0e9a8bd18dea022955e24c9b9c7272ea47735480686baa7915128fab3ff6a687c3f8f64a44e2cf04943130590643eb0ad5c94219c85', 'admin', '2023-03-29 18:53:09'),
(109, 'd47b5542188de350ce5760f650596fa7c020e27c3d4e81e7513735e885bb9d545aba12fb2152c0ad4a1208b0aaf32950b513696067f46e248c8717e0efecc27a', 'admin', '2023-03-29 20:02:51'),
(110, '4038f677d01456d8c7aa24bb14f670e41c13c584b34c1dbfbc129b6c02327bb1d3361f797da7b05810d9cf257c6ffe2360afdd6c26e5fe8c2608a6ff279fff7a', 'admin', '2023-03-29 20:07:25'),
(111, 'dc3eb70120ba41ab6262540ea7c68e6aeb7df38e5e1ac435507b66fbf3e2047eac86d308a17c30c3f5f9fecb559eb5d0a6b8a85a5016f19db19b786492121b1a', 'admin', '2023-03-29 21:03:38'),
(112, '781206b322bfcc82eca6512b954cd15cc1a52820201d98ec16910a75df3938fe7c24f8f7d42c2325dc00439071e60a5ae5072202f029ff3fa7db986946c8d2fd', 'admin', '2023-03-30 06:34:49'),
(113, '1a24301b428fa8f6e2301050c462a36d26ed554dc2c48bf5f72a3371f7ff29b3edc6fe6bd4cfdf9f0a1244e287c4a56d49ff6ac63b8c44869efffcb5ef3d1201', 'admin', '2023-03-30 06:43:44'),
(114, '0f38ad8a434279d131356163357aa1b76b60c15c088d8a1faf8304304daf0e38208f9b274ca504c0535563ec8b1c27a2dcdbfa253539d5d175f199d5bb2bf28c', 'admin', '2023-03-30 07:32:47'),
(115, 'b3b8692b77d73bfe03dbc32b3766aceaa71233577a261410a6cfbcb8f3f7ae2c56fd89319f7779ed92669dbd41e2b78c1f03cb6f1ba561c7a43e563e88e6c223', 'admin', '2023-03-30 08:56:29'),
(116, '8a14a647b7cf985b967505e9e9c15ea966dda49e63cd0a76b347db0dad474f1acae87ca3c5b5e50ea6d1f275451a8abf07b0936d53a26d901d1c7ea2e84ed5e5', 'admin', '2023-03-30 10:05:24'),
(117, '2a6ef84cfbe87fcb9203d878de23dbc20efda6fa24cf209042ece3f1feb01dedf8ebab7216c7a6c502162d7176ca170559fe7efb64c4d0fc4393a41c4a725ab2', 'admin', '2023-03-30 11:08:11'),
(118, '52013ffb14849272ebe5126c6bf6b7e8a3479822b3c33ebb0d480f018edde1c300e78bcd945604696890f054fae211b721528528a4c18fbd4b019059f79a6acd', 'admin', '2023-03-30 12:17:25'),
(119, '7f396b7443d3a331a6128530057f34dab0b3d615ee87909d70d6fd106820ca4dd29bc58f31cc557a54e1b6f52d7f4f328628a9eeff45eb9af55053b052c892ed', 'admin', '2023-03-30 13:35:44');

--
-- Dumping data for table `VSAPP_Applications`
--

INSERT INTO `VSAPP_Applications` (`id`, `title`, `hostname`, `code`, `enabled`, `created_at`, `updated_at`) VALUES
(1, 'Admin Panel', 'admin.wgp.lh', 'admin-panel', 1, '2022-04-13 16:45:57', '2022-04-13 16:45:57'),
(2, 'Web Guitar Pro', 'wgp.lh', 'web-guitar-pro', 1, '2022-04-13 16:47:36', '2022-04-13 16:47:36');

--
-- Dumping data for table `VSAPP_Locale`
--

INSERT INTO `VSAPP_Locale` (`id`, `code`, `created_at`, `updated_at`, `title`) VALUES
(1, 'en_US', '2022-04-13 16:45:36', '2023-01-02 19:53:33', 'English (US)'),
(2, 'bg_BG', '2022-04-13 16:45:36', '2023-01-02 19:53:44', 'Bulgarian');

--
-- Dumping data for table `VSAPP_LogEntries`
--

INSERT INTO `VSAPP_LogEntries` (`id`, `locale`, `action`, `logged_at`, `object_id`, `object_class`, `version`, `data`, `username`) VALUES
(1, 'en_US', 'create', '2022-04-13 16:45:36', NULL, 'App\\Entity\\Cms\\Page', 1, 'a:1:{s:4:\"text\";s:27:\"<h1>Under Construction</h1>\";}', NULL),
(2, 'en_US', 'create', '2022-05-09 11:25:41', NULL, 'App\\Entity\\Cms\\Page', 1, 'a:1:{s:4:\"text\";s:27:\"<p>Terms and Conditions</p>\";}', 'admin'),
(3, 'en_US', 'create', '2023-01-24 09:10:25', '3', 'App\\Entity\\Cms\\Page', 1, 'a:1:{s:4:\"text\";s:77:\"<p>WebGuitarPro is an application for viewing and playing GuitarPro tabs.</p>\";}', 'admin');

--
-- Dumping data for table `VSAPP_Settings`
--

INSERT INTO `VSAPP_Settings` (`id`, `maintenanceMode`, `theme`, `application_id`, `maintenance_page_id`) VALUES
(1, 0, NULL, NULL, NULL),
(2, 0, 'vankosoft/application-theme-2', 2, NULL),
(3, 0, 'vankosoft/web-guitar-pro-vuejs', 2, NULL),
(4, 0, 'vankosoft/web-guitar-pro-standard', 2, NULL),
(5, 0, 'vankosoft/web-guitar-pro-vuejs', 2, NULL),
(6, 0, 'vankosoft/web-guitar-pro-reactjs', 2, NULL),
(7, 0, 'vankosoft/web-guitar-pro-vuejs', 2, NULL),
(8, 0, 'vankosoft/web-guitar-pro-reactjs', 2, NULL),
(9, 0, 'vankosoft/web-guitar-pro-angularjs', 2, NULL),
(10, 0, 'vankosoft/web-guitar-pro-reactjs', 2, NULL),
(11, 0, 'vankosoft/web-guitar-pro-angularjs', 2, NULL),
(12, 0, 'vankosoft/web-guitar-pro-reactjs', 2, NULL),
(13, 0, 'vankosoft/web-guitar-pro-vuejs', 2, NULL),
(14, 0, 'vankosoft/web-guitar-pro-angularjs', 2, NULL),
(15, 0, 'vankosoft/web-guitar-pro-reactjs', 2, NULL),
(16, 0, 'vankosoft/web-guitar-pro-angularjs', 2, NULL);

--
-- Dumping data for table `VSAPP_Taxonomy`
--

INSERT INTO `VSAPP_Taxonomy` (`id`, `code`, `root_taxon_id`, `name`, `description`) VALUES
(1, 'page-categories', 1, 'Page Categories', 'Page Categories'),
(2, 'document-categories', 2, 'Document Categories', 'Categories for TOC Documents'),
(3, 'document-pages', 3, 'Document Pages', 'Document Pages for Building a TOC'),
(4, 'user-roles', 4, 'User Roles', 'User Roles Taxonomy'),
(5, 'file-managers', 5, 'File Managers', 'FileManagers Taxonomy'),
(7, 'paid-service-categories', 21, 'Paid Service Categories', 'Paid Service Categories'),
(15, 'tablature-categories', 41, 'Tablature Categories', 'Tablature Categories');

--
-- Dumping data for table `VSAPP_Taxons`
--

INSERT INTO `VSAPP_Taxons` (`id`, `tree_root`, `parent_id`, `code`, `tree_left`, `tree_right`, `tree_level`, `position`, `enabled`) VALUES
(1, 1, NULL, 'page-categories', 1, 6, 0, NULL, 1),
(2, 2, NULL, 'document-categories', 1, 2, 0, NULL, 1),
(3, 3, NULL, 'document-pages', 1, 2, 0, NULL, 1),
(4, 4, NULL, 'user-roles', 1, 8, 0, NULL, 1),
(5, 5, NULL, 'file-managers', 1, 2, 0, NULL, 1),
(6, 1, 1, 'maintenance-pages', 2, 3, 1, NULL, 1),
(7, 4, 4, 'role-super-admin', 2, 3, 1, NULL, 1),
(8, 4, 4, 'role-application-admin', 4, 7, 1, NULL, 1),
(9, 4, 8, 'role-web-guitar-pro', 5, 6, 2, NULL, 1),
(21, 21, NULL, 'paid-service-categories', 1, 4, 0, NULL, 1),
(22, 21, 21, 'web-guitar-pro', 2, 3, 1, NULL, 1),
(41, 41, NULL, 'tablature-categories', 1, 14, 0, NULL, 1),
(43, 41, 41, 'slayer', 2, 3, 1, NULL, 1),
(51, 41, 41, 'vital-remains', 4, 5, 1, NULL, 1),
(53, 1, 1, 'webguitarpro-pages', 4, 5, 1, NULL, 1),
(54, 41, 41, 'acoustic', 6, 7, 1, NULL, 1),
(61, 41, 41, 'consequence', 8, 13, 1, NULL, 1),
(65, 41, 61, 'riffs', 9, 10, 2, NULL, 1),
(66, 41, 61, 'tracks', 11, 12, 2, NULL, 1);

--
-- Dumping data for table `VSAPP_TaxonTranslations`
--

INSERT INTO `VSAPP_TaxonTranslations` (`id`, `translatable_id`, `locale`, `name`, `slug`, `description`) VALUES
(1, 1, 'en_US', 'Root taxon of Taxonomy: \"Page Categories', 'page-categories', 'Root taxon of Taxonomy: \"Page Categories\"'),
(2, 2, 'en_US', 'Root taxon of Taxonomy: \"Document Categories', 'document-categories', 'Root taxon of Taxonomy: \"Document Categories\"'),
(3, 3, 'en_US', 'Root taxon of Taxonomy: \"Document Pages', 'document-pages', 'Root taxon of Taxonomy: \"Document Pages\"'),
(4, 4, 'en_US', 'Root taxon of Taxonomy: \"User Roles', 'user-roles', 'Root taxon of Taxonomy: \"User Roles\"'),
(5, 5, 'en_US', 'Root taxon of Taxonomy: \"File Managers', 'file-managers', 'Root taxon of Taxonomy: \"File Managers\"'),
(6, 6, 'en_US', 'Maintenance Pages', 'maintenance-pages', 'Maintenance Pages Description'),
(7, 7, 'en_US', 'Role Super Admin', 'role-super-admin', 'Role Super Admin Description'),
(8, 8, 'en_US', 'Role Application Admin', 'role-application-admin', 'Role Application Admin Description'),
(9, 9, 'en_US', 'Role Web Guitar Pro', 'role-web-guitar-pro', 'Web Guitar Pro'),
(21, 21, 'en_US', 'Paid Service Categories', 'paid-service-categories', 'Root taxon of Taxonomy: \"Paid Service Categories\"'),
(22, 22, 'en_US', 'Web Guitar Pro', 'web-guitar-pro', NULL),
(41, 41, 'en_US', 'Tablature Categories', 'tablature-categories', 'Root taxon of Taxonomy: \"Tablature Categories\"'),
(43, 43, 'en_US', 'Slayer', 'slayer', NULL),
(51, 51, 'en_US', 'Vital Remains', 'vital-remains', NULL),
(53, 53, 'en_US', 'WebGuitarPro Pages', 'webguitarpro-pages', NULL),
(54, 54, 'bg_BG', 'Acoustic', 'acoustic', NULL),
(61, 61, 'en_US', 'Consequence', 'consequence', NULL),
(65, 65, 'en_US', 'Riffs', 'riffs', NULL),
(66, 66, 'en_US', 'Tracks', 'tracks', NULL);

--
-- Dumping data for table `VSAPP_Translations`
--

INSERT INTO `VSAPP_Translations` (`id`, `locale`, `object_class`, `field`, `foreign_key`, `content`) VALUES
(1, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'name', '1', 'Page Categories'),
(2, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'description', '1', 'Page Categories'),
(3, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'name', '2', 'Document Categories'),
(4, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'description', '2', 'Categories for TOC Documents'),
(5, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'name', '3', 'Document Pages'),
(6, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'description', '3', 'Document Pages for Building a TOC'),
(7, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'name', '4', 'User Roles'),
(8, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'description', '4', 'User Roles Taxonomy'),
(9, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'name', '5', 'File Managers'),
(10, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'description', '5', 'FileManagers Taxonomy'),
(11, 'en_US', 'App\\Entity\\Cms\\Page', 'title', '1', 'Under Construction'),
(12, 'en_US', 'App\\Entity\\Cms\\Page', 'text', '1', '<h1>Under Construction</h1>'),
(13, 'en_US', 'App\\Entity\\Cms\\Page', 'title', '2', 'Terms and Conditions'),
(14, 'en_US', 'App\\Entity\\Cms\\Page', 'description', '2', 'Terms and Conditions'),
(15, 'en_US', 'App\\Entity\\Cms\\Page', 'text', '2', '<p>Terms and Conditions</p>'),
(18, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'name', '7', 'Paid Service Categories'),
(19, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'description', '7', 'Paid Service Categories'),
(20, 'en_US', 'App\\Entity\\UsersSubscriptions\\PayedService', 'title', '1', 'Paid Tablatures Store'),
(21, 'en_US', 'App\\Entity\\UsersSubscriptions\\PayedService', 'description', '1', '<p>Paid Tablatures Store</p>'),
(22, 'en_US', 'App\\Entity\\Payment\\PaymentMethod', 'name', '1', 'Credit Card'),
(23, 'bg', 'App\\Entity\\UsersSubscriptions\\PayedService', 'title', '1', 'Medium Tablatures Store'),
(24, 'bg', 'App\\Entity\\UsersSubscriptions\\PayedService', 'description', '1', '<p>Medium Tablatures Store</p>'),
(25, 'bg', 'App\\Entity\\UsersSubscriptions\\PayedService', 'title', '2', 'Unlimited Tablatures Store'),
(26, 'bg', 'App\\Entity\\UsersSubscriptions\\PayedService', 'description', '2', '<p>Unlimited Tablatures Store</p>'),
(27, 'en_US', 'App\\Entity\\UsersSubscriptions\\PayedService', 'title', '3', 'Medium Tablatures Store'),
(28, 'en_US', 'App\\Entity\\UsersSubscriptions\\PayedService', 'description', '3', '<p>Medium Tablatures Store</p>'),
(29, 'en_US', 'App\\Entity\\UsersSubscriptions\\PayedService', 'title', '4', 'Unlimited Tablatures Store'),
(30, 'en_US', 'App\\Entity\\UsersSubscriptions\\PayedService', 'description', '4', '<p>Unlimited Tablatures Store</p>'),
(45, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'name', '15', 'Tablature Categories'),
(46, 'en_US', 'App\\Entity\\Application\\Taxonomy', 'description', '15', 'Tablature Categories'),
(47, 'en_US', 'App\\Entity\\Application\\Locale', 'title', '1', 'English (US)'),
(48, 'en_US', 'App\\Entity\\Application\\Locale', 'title', '2', 'Bulgarian'),
(49, 'en_US', 'App\\Entity\\Cms\\Page', 'title', '3', 'About Application'),
(50, 'en_US', 'App\\Entity\\Cms\\Page', 'description', '3', 'About this Application'),
(51, 'en_US', 'App\\Entity\\Cms\\Page', 'text', '3', '<p>WebGuitarPro is an application for viewing and playing GuitarPro tabs.</p>');

--
-- Dumping data for table `VSCMS_PageCategories`
--

INSERT INTO `VSCMS_PageCategories` (`id`, `parent_id`, `taxon_id`) VALUES
(1, NULL, 6),
(2, NULL, 53);

--
-- Dumping data for table `VSCMS_Pages`
--

INSERT INTO `VSCMS_Pages` (`id`, `published`, `slug`, `title`, `text`, `description`) VALUES
(1, 1, 'under-construction', 'Under Construction', '<h1>Under Construction</h1>', NULL),
(2, 1, 'terms-and-conditions', 'Terms and Conditions', '<p>Terms and Conditions</p>', 'Terms and Conditions'),
(3, 1, 'about-application', 'About Application', '<p>WebGuitarPro is an application for viewing and playing GuitarPro tabs.</p>', 'About this Application');

--
-- Dumping data for table `VSCMS_Pages_Categories`
--

INSERT INTO `VSCMS_Pages_Categories` (`page_id`, `category_id`) VALUES
(1, 1),
(2, 2),
(3, 2);

--
-- Dumping data for table `VSPAY_GatewayConfig`
--

INSERT INTO `VSPAY_GatewayConfig` (`id`, `gateway_name`, `factory_name`, `config`, `use_sandbox`, `sandbox_config`, `title`, `description`) VALUES
(1, 'stripe_checkout', 'stripe_checkout', '{\"publishable_key\":\"pk_test_4usJseX4BL8ZuSa9efnggWj800U21erI5Y\",\"secret_key\":\"sk_test_QHNIIAE1D7L5oqy54cxM4pXD00GO1NH64K\",\"sandbox\":false}', 1, '{\"publishable_key\":\"pk_test_4usJseX4BL8ZuSa9efnggWj800U21erI5Y\",\"secret_key\":\"sk_test_QHNIIAE1D7L5oqy54cxM4pXD00GO1NH64K\",\"sandbox\":false}', '', NULL),
(2, 'stripe_js', 'stripe_js', '{\"publishable_key\":\"pk_test_4usJseX4BL8ZuSa9efnggWj800U21erI5Y\",\"secret_key\":\"sk_test_QHNIIAE1D7L5oqy54cxM4pXD00GO1NH64K\"}', 1, '{\"sandbox\":\"true\",\"publishable_key\":\"pk_test_4usJseX4BL8ZuSa9efnggWj800U21erI5Y\",\"secret_key\":\"sk_test_QHNIIAE1D7L5oqy54cxM4pXD00GO1NH64K\"}', '', NULL),
(3, 'Test Paypal Express Checkout', 'paypal_express_checkout', '{\"username\":\"sb-wqxm3403839_api1.business.example.com\",\"password\":\" SZY67BELKDNT9NAY\",\"signature\":\"Aa04CBBS7nO8ju0WLRGbCUW98Bi1A.dDREmtNwcCNmBK9NCcng4fXAG3\",\"sandbox\":false}', 0, '{\"sandbox\":true,\"username\":\"sb-wqxm3403839_api1.business.example.com\",\"password\":\" SZY67BELKDNT9NAY\",\"signature\":\"Aa04CBBS7nO8ju0WLRGbCUW98Bi1A.dDREmtNwcCNmBK9NCcng4fXAG3\"}', '', NULL);

--
-- Dumping data for table `VSPAY_Order`
--

INSERT INTO `VSPAY_Order` (`id`, `user_id`, `payment_method_id`, `payment_id`, `total_amount`, `currency_code`, `description`, `created_at`, `updated_at`, `status`) VALUES
(1, NULL, NULL, NULL, 140, 'EUR', 'VankoSoft Payment', '2022-05-24 14:26:28', '2022-05-24 14:33:36', 'shopping_cart'),
(2, 1, 1, 5, 20, 'EUR', 'Payment for Unlimited Tablatures Store', '2022-05-24 14:44:36', '2022-05-24 14:44:45', 'shopping_cart'),
(3, 1, 1, 6, 20, 'EUR', 'Payment for Unlimited Tablatures Store', '2022-05-24 15:22:13', '2022-05-24 15:22:18', 'shopping_cart'),
(4, 1, 1, 7, 20, 'EUR', 'Payment for Unlimited Tablatures Store', '2022-05-24 17:20:04', '2022-05-24 17:20:12', 'shopping_cart'),
(5, 1, 1, 8, 20, 'EUR', 'Payment for Unlimited Tablatures Store', '2022-05-24 17:23:57', '2022-05-24 17:24:23', 'paid_order'),
(6, 1, NULL, NULL, 180, 'EUR', 'VankoSoft Payment', '2022-05-24 21:04:50', '2022-05-24 22:40:06', 'shopping_cart'),
(7, 1, 1, 9, 90, 'EUR', 'Payment for Unlimited Tablatures Store', '2022-06-10 13:59:34', '2022-06-11 09:58:17', 'shopping_cart'),
(8, 1, 1, 10, 10, 'EUR', 'Payment for Unlimited Tablatures Store', '2022-06-11 18:47:36', '2022-06-11 18:47:40', 'shopping_cart'),
(9, 1, 1, 11, 10, 'EUR', 'Payment for Unlimited Tablatures Store', '2022-06-11 21:16:42', '2022-06-11 21:22:45', 'paid_order'),
(10, 1, NULL, NULL, 20, 'EUR', 'VankoSoft Payment', '2022-09-18 10:09:04', '2022-09-18 10:11:11', 'shopping_cart'),
(11, 1, NULL, NULL, 20, 'EUR', 'VankoSoft Payment', '2022-09-22 13:40:29', '2022-09-22 13:54:14', 'shopping_cart'),
(12, 1, NULL, NULL, 10, 'EUR', 'VankoSoft Payment', '2022-09-24 21:42:01', '2022-09-24 21:42:01', 'shopping_cart'),
(13, 1, NULL, NULL, 60, 'EUR', 'VankoSoft Payment', '2023-01-24 16:45:50', '2023-01-24 16:46:07', 'shopping_cart');

--
-- Dumping data for table `VSPAY_OrderItem`
--

INSERT INTO `VSPAY_OrderItem` (`id`, `order_id`, `object_id`, `object_type`, `price`, `currency_code`) VALUES
(1, 1, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(2, 1, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(3, 1, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(4, 1, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(5, 1, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(6, 1, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(7, 1, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(8, 2, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(9, 3, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(10, 4, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(11, 5, 3, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(12, 6, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(13, 6, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(14, 6, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(15, 6, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(16, 6, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(17, 6, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(18, 6, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(19, 6, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(20, 6, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(21, 7, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(22, 7, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 20, 'EUR'),
(23, 7, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(24, 7, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(25, 7, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(26, 7, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(27, 7, 1, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(28, 8, 3, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(29, 9, 3, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(30, 10, 3, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(31, 10, 3, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(32, 11, 3, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(33, 11, 3, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(34, 12, 3, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR'),
(35, 13, 4, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 50, 'EUR'),
(36, 13, 3, 'App\\Entity\\UsersSubscriptions\\PayedServiceSubscriptionPeriod', 10, 'EUR');

--
-- Dumping data for table `VSPAY_Payment`
--

INSERT INTO `VSPAY_Payment` (`id`, `number`, `description`, `client_email`, `client_id`, `total_amount`, `currency_code`, `details`, `created_at`) VALUES
(5, '628cc52d63006', 'Payment for Unlimited Tablatures Store', 'admin@wgp.lh', '1', 20, 'EUR', '{\"local\":{\"save_card\":true}}', '2022-05-24 14:44:45'),
(6, '628ccdfa64c9e', 'Payment for Unlimited Tablatures Store', 'admin@wgp.lh', '1', 20, 'EUR', '{\"local\":{\"save_card\":true,\"customer\":{\"card\":\"tok_1L2x8FCozROjz2jX0B5dSY7N\",\"id\":\"cus_LkS2qU4DVQWXt9\",\"object\":\"customer\",\"address\":null,\"balance\":0,\"created\":1653396400,\"currency\":null,\"default_source\":\"card_1L2x8FCozROjz2jXtXpBasFx\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":null,\"invoice_prefix\":\"8FF85A65\",\"invoice_settings\":{\"custom_fields\":null,\"default_payment_method\":null,\"footer\":null},\"livemode\":false,\"metadata\":[],\"name\":null,\"next_invoice_sequence\":1,\"phone\":null,\"preferred_locales\":[],\"shipping\":null,\"sources\":{\"object\":\"list\",\"data\":[{\"id\":\"card_1L2x8FCozROjz2jXtXpBasFx\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LkS2qU4DVQWXt9\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2023,\"fingerprint\":\"IZPx4KBKxKQrAoNV\",\"funding\":\"credit\",\"last4\":\"1111\",\"metadata\":[],\"name\":null,\"tokenization_method\":null}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/customers\\/cus_LkS2qU4DVQWXt9\\/sources\"},\"subscriptions\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_LkS2qU4DVQWXt9\\/subscriptions\"},\"tax_exempt\":\"none\",\"tax_ids\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_LkS2qU4DVQWXt9\\/tax_ids\"},\"tax_info\":null,\"tax_info_verification\":null,\"test_clock\":null}},\"amount\":20,\"currency\":\"EUR\",\"description\":\"Payment for Unlimited Tablatures Store\",\"customer\":\"cus_LkS2qU4DVQWXt9\",\"error\":{\"code\":\"amount_too_small\",\"doc_url\":\"https:\\/\\/stripe.com\\/docs\\/error-codes\\/amount-too-small\",\"message\":\"Amount must convert to at least 100 stotinka. \\u20ac0.20 converts to approximately 0.39 \\u043b\\u0432.\",\"param\":\"amount\",\"type\":\"invalid_request_error\"}}', '2022-05-24 15:22:18'),
(7, '628ce99c52486', 'Payment for Unlimited Tablatures Store', 'admin@wgp.lh', '1', 2000, 'EUR', '{\"local\":{\"save_card\":true,\"customer\":{\"card\":\"tok_1L2yb4CozROjz2jX5ek2Abb7\",\"id\":\"cus_LkTYLoqxlkTtS1\",\"object\":\"customer\",\"address\":null,\"balance\":0,\"created\":1653402031,\"currency\":null,\"default_source\":\"card_1L2yb3CozROjz2jXud7pOvII\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":null,\"invoice_prefix\":\"1C8E76DC\",\"invoice_settings\":{\"custom_fields\":null,\"default_payment_method\":null,\"footer\":null},\"livemode\":false,\"metadata\":[],\"name\":null,\"next_invoice_sequence\":1,\"phone\":null,\"preferred_locales\":[],\"shipping\":null,\"sources\":{\"object\":\"list\",\"data\":[{\"id\":\"card_1L2yb3CozROjz2jXud7pOvII\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LkTYLoqxlkTtS1\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2023,\"fingerprint\":\"IZPx4KBKxKQrAoNV\",\"funding\":\"credit\",\"last4\":\"1111\",\"metadata\":[],\"name\":null,\"tokenization_method\":null}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/customers\\/cus_LkTYLoqxlkTtS1\\/sources\"},\"subscriptions\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_LkTYLoqxlkTtS1\\/subscriptions\"},\"tax_exempt\":\"none\",\"tax_ids\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_LkTYLoqxlkTtS1\\/tax_ids\"},\"tax_info\":null,\"tax_info_verification\":null,\"test_clock\":null}},\"amount\":2000,\"currency\":\"eur\",\"description\":\"Payment for Unlimited Tablatures Store\",\"customer\":\"cus_LkTYLoqxlkTtS1\",\"id\":\"ch_3L2yb7CozROjz2jX02W3juK4\",\"object\":\"charge\",\"amount_captured\":2000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3L2yb7CozROjz2jX0FZfAujq\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"VANKOSOFT.ORG\",\"captured\":true,\"created\":1653402033,\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_balance_transaction\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":45,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1L2yb3CozROjz2jXud7pOvII\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":1,\"exp_year\":2023,\"fingerprint\":\"IZPx4KBKxKQrAoNV\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"1111\",\"mandate\":null,\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/payment\\/CAcaFwoVYWNjdF8xRldEbEVDb3pST2p6MmpYKLLTs5QGMgb_b9bthw86LBY5OBJB-RrmJOU9yVTWbYtHKjQDQYnRvyeQipsaxAMCjp4DesEz7ay0BDdv\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3L2yb7CozROjz2jX02W3juK4\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1L2yb3CozROjz2jXud7pOvII\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LkTYLoqxlkTtS1\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2023,\"fingerprint\":\"IZPx4KBKxKQrAoNV\",\"funding\":\"credit\",\"last4\":\"1111\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '2022-05-24 17:20:12'),
(8, '628cea818bac2', 'Payment for Unlimited Tablatures Store', 'admin@wgp.lh', '1', 2000, 'EUR', '{\"local\":{\"save_card\":true,\"customer\":{\"card\":\"tok_1L2yekCozROjz2jX9n7XnHOh\",\"id\":\"cus_LkTbk54jjKCP3O\",\"object\":\"customer\",\"address\":null,\"balance\":0,\"created\":1653402259,\"currency\":null,\"default_source\":\"card_1L2yekCozROjz2jXFcahJJ39\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":null,\"invoice_prefix\":\"C3BC0BFE\",\"invoice_settings\":{\"custom_fields\":null,\"default_payment_method\":null,\"footer\":null},\"livemode\":false,\"metadata\":[],\"name\":null,\"next_invoice_sequence\":1,\"phone\":null,\"preferred_locales\":[],\"shipping\":null,\"sources\":{\"object\":\"list\",\"data\":[{\"id\":\"card_1L2yekCozROjz2jXFcahJJ39\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LkTbk54jjKCP3O\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2024,\"fingerprint\":\"IZPx4KBKxKQrAoNV\",\"funding\":\"credit\",\"last4\":\"1111\",\"metadata\":[],\"name\":null,\"tokenization_method\":null}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/customers\\/cus_LkTbk54jjKCP3O\\/sources\"},\"subscriptions\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_LkTbk54jjKCP3O\\/subscriptions\"},\"tax_exempt\":\"none\",\"tax_ids\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_LkTbk54jjKCP3O\\/tax_ids\"},\"tax_info\":null,\"tax_info_verification\":null,\"test_clock\":null}},\"amount\":2000,\"currency\":\"eur\",\"description\":\"Payment for Unlimited Tablatures Store\",\"customer\":\"cus_LkTbk54jjKCP3O\",\"id\":\"ch_3L2yemCozROjz2jX02ToJqAO\",\"object\":\"charge\",\"amount_captured\":2000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3L2yemCozROjz2jX0sGzIVY7\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"VANKOSOFT.ORG\",\"captured\":true,\"created\":1653402260,\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_balance_transaction\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":8,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1L2yekCozROjz2jXFcahJJ39\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":1,\"exp_year\":2024,\"fingerprint\":\"IZPx4KBKxKQrAoNV\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"1111\",\"mandate\":null,\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/payment\\/CAcaFwoVYWNjdF8xRldEbEVDb3pST2p6MmpYKJXVs5QGMgZrcwGSlmk6LBbRbKDdb1D9S76krFsChOR0dktVBN76WMr94gCtb3KEPeAJ4iiNdlrQOtHb\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3L2yemCozROjz2jX02ToJqAO\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1L2yekCozROjz2jXFcahJJ39\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LkTbk54jjKCP3O\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2024,\"fingerprint\":\"IZPx4KBKxKQrAoNV\",\"funding\":\"credit\",\"last4\":\"1111\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '2022-05-24 17:24:01'),
(9, '62a43d09b8b4c', 'Payment for Unlimited Tablatures Store', 'admin@wgp.lh', '1', 9000, 'EUR', '{\"local\":{\"save_card\":true}}', '2022-06-11 09:58:17'),
(10, '62a4b91c56f2d', 'Payment for Unlimited Tablatures Store', 'admin@wgp.lh', '1', 1000, 'EUR', '{\"local\":{\"save_card\":true}}', '2022-06-11 18:47:40'),
(11, '62a4dc0ec23dd', 'Payment for Unlimited Tablatures Store', 'admin@wgp.lh', '1', 1000, 'EUR', '{\"local\":{\"save_card\":true,\"customer\":{\"card\":\"tok_1L9YsHCozROjz2jXOxVCAhMI\",\"id\":\"cus_LrHR4pIot0AIcd\",\"object\":\"customer\",\"address\":null,\"balance\":0,\"created\":1654971450,\"currency\":null,\"default_source\":\"card_1L9YsHCozROjz2jXEyYpd0AR\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":null,\"invoice_prefix\":\"0A2A57E1\",\"invoice_settings\":{\"custom_fields\":null,\"default_payment_method\":null,\"footer\":null,\"rendering_options\":null},\"livemode\":false,\"metadata\":[],\"name\":null,\"next_invoice_sequence\":1,\"phone\":null,\"preferred_locales\":[],\"shipping\":null,\"sources\":{\"object\":\"list\",\"data\":[{\"id\":\"card_1L9YsHCozROjz2jXEyYpd0AR\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LrHR4pIot0AIcd\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2025,\"fingerprint\":\"IZPx4KBKxKQrAoNV\",\"funding\":\"credit\",\"last4\":\"1111\",\"metadata\":[],\"name\":null,\"tokenization_method\":null}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/customers\\/cus_LrHR4pIot0AIcd\\/sources\"},\"subscriptions\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_LrHR4pIot0AIcd\\/subscriptions\"},\"tax_exempt\":\"none\",\"tax_ids\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/customers\\/cus_LrHR4pIot0AIcd\\/tax_ids\"},\"tax_info\":null,\"tax_info_verification\":null,\"test_clock\":null}},\"amount\":1000,\"currency\":\"eur\",\"description\":\"Payment for Unlimited Tablatures Store\",\"customer\":\"cus_LrHR4pIot0AIcd\",\"id\":\"ch_3L9YsJCozROjz2jX1dZMDZza\",\"object\":\"charge\",\"amount_captured\":1000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3L9YsJCozROjz2jX1mgkbvQE\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"VANKOSOFT.ORG\",\"captured\":true,\"created\":1654971451,\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_balance_transaction\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":56,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1L9YsHCozROjz2jXEyYpd0AR\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":1,\"exp_year\":2025,\"fingerprint\":\"IZPx4KBKxKQrAoNV\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"1111\",\"mandate\":null,\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1FWDlECozROjz2jX\\/ch_3L9YsJCozROjz2jX1dZMDZza\\/rcpt_LrHRpX2NRVhERcJrflv7Q3CyFpra46X\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3L9YsJCozROjz2jX1dZMDZza\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1L9YsHCozROjz2jXEyYpd0AR\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LrHR4pIot0AIcd\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":1,\"exp_year\":2025,\"fingerprint\":\"IZPx4KBKxKQrAoNV\",\"funding\":\"credit\",\"last4\":\"1111\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '2022-06-11 21:16:46');

--
-- Dumping data for table `VSPAY_PaymentMethod`
--

INSERT INTO `VSPAY_PaymentMethod` (`id`, `gateway_id`, `name`, `active`, `slug`) VALUES
(1, 2, 'Credit Card', 1, 'credit-card');

--
-- Dumping data for table `VSUM_AvatarImage`
--

INSERT INTO `VSUM_AvatarImage` (`id`, `owner_id`, `type`, `path`, `original_name`) VALUES
(1, 1, NULL, 'c8/09/de225d76e75ecd03f3360863ce52.png', ''),
(2, 2, NULL, '83/c7/757073fb015c7b748b244156939e.png', '');

--
-- Dumping data for table `VSUM_UserRoles`
--

INSERT INTO `VSUM_UserRoles` (`id`, `parent_id`, `taxon_id`, `role`) VALUES
(1, NULL, 7, 'ROLE_SUPER_ADMIN'),
(2, NULL, 8, 'ROLE_APPLICATION_ADMIN'),
(3, 2, 9, 'ROLE_WEB_GUITAR_PRO_ADMIN');

--
-- Dumping data for table `VSUM_Users`
--

INSERT INTO `VSUM_Users` (`id`, `info_id`, `salt`, `password`, `roles_array`, `username`, `email`, `prefered_locale`, `last_login`, `confirmation_token`, `password_requested_at`, `verified`, `enabled`) VALUES
(1, 1, '9baea75cce1cfe191ee9b4b98eedbc12', '$2y$13$UADGq2VCSJDGbKJ82uX1kOjDcmdAk.stixNvpgVDyWiPZsR8QdinG', 'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}', 'admin', 'admin@wgp.lh', 'en_US', '2023-02-28 14:05:49', NULL, NULL, 1, 1),
(2, 2, 'd10545c6a28fdba2511e1eb32d56c613', '$2y$13$GvIC1aPJevV7E/Af.n/ASO4fJ.76I8A.heYZt4/M06e.tRk6mKSpi', 'a:1:{i:0;s:22:\"ROLE_APPLICATION_ADMIN\";}', 'appadmin', 'appadmin@wgp.lh', 'en_US', '2022-09-21 18:55:29', NULL, NULL, 1, 1),
(3, 3, '5bc269229ea1bef6dcaec3d5cf4929b9', '$2y$13$94W5JzY8p8iJevn8ZndcjegSTR8XlWnIMcZwmeRMeJSLGimMZjXNG', 'N;', 'ivan1', 'ivan1@wgp.lh', 'en_US', '2022-05-09 19:26:28', NULL, NULL, 1, 1),
(4, 4, 'b30182a07e3f385be1732dc96af1dd59', '$2y$13$.9rKF7cq71Pn93998ynEh.F1dt2lzxN7HWonzPv0PLtl.vNu.cEj2', 'N;', 'ivan33', 'ivan33@wgp.lh', 'en_US', '2022-09-24 19:34:23', NULL, NULL, 1, 1),
(5, 5, '33dacb743ccb4d8cb5966f5606915ff9', '$2y$13$dS.ndf722b997YKlb/hs8.lS16905nbXSJEnst0MnrZP61fFuEqAe', 'N;', 'wgpuser', 'wgpuser@wgp.lh', 'en_US', NULL, NULL, NULL, 1, 1),
(6, 6, 'ea8eef693f70c40e0c609d450141037e', '$2y$13$3MdqHe./9QJaJI3FkU3eYekbMaWHdp6WaqGwtgRsnvAQPrTTw794O', 'N;', 'testuser', 'sdasdad@sdfsdf.cd', 'bg_BG', '2023-01-25 17:33:28', NULL, NULL, 1, 1);

--
-- Dumping data for table `VSUM_UsersInfo`
--

INSERT INTO `VSUM_UsersInfo` (`id`, `country`, `birthday`, `mobile`, `website`, `occupation`, `first_name`, `last_name`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 'Super', 'Admin'),
(2, NULL, NULL, NULL, NULL, NULL, 'Applications', 'Admin'),
(3, NULL, NULL, NULL, NULL, NULL, 'NOT_EDITED_YET', 'NOT_EDITED_YET'),
(4, NULL, NULL, NULL, NULL, NULL, 'NOT_EDITED_YET', 'NOT_EDITED_YET'),
(5, NULL, NULL, NULL, NULL, NULL, 'NOT_EDITED_YET', 'NOT_EDITED_YET'),
(6, NULL, NULL, NULL, NULL, NULL, 'Testuser', 'Bulgarian');

--
-- Dumping data for table `VSUM_Users_Roles`
--

INSERT INTO `VSUM_Users_Roles` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 3),
(5, 3),
(6, 3);

--
-- Dumping data for table `VSUS_PayedServiceCategories`
--

INSERT INTO `VSUS_PayedServiceCategories` (`id`, `taxon_id`) VALUES
(1, 22);

--
-- Dumping data for table `VSUS_PayedServices`
--

INSERT INTO `VSUS_PayedServices` (`id`, `category_id`, `title`, `description`, `subscription_code`, `subscription_priority`) VALUES
(3, 1, 'Medium Tablatures Store', '<p>Medium Tablatures Store</p>', 'paid_tablature_store', 1),
(4, 1, 'Unlimited Tablatures Store', '<p>Unlimited Tablatures Store</p>', 'paid_tablature_store', 5);

--
-- Dumping data for table `VSUS_PayedServicesAttributes`
--

INSERT INTO `VSUS_PayedServicesAttributes` (`id`, `payed_service_id`, `name`, `value`) VALUES
(1, 3, 'tablature_storage', '100'),
(2, 4, 'tablature_storage', '100000');

--
-- Dumping data for table `VSUS_PayedServiceSubscriptionPeriods`
--

INSERT INTO `VSUS_PayedServiceSubscriptionPeriods` (`id`, `payed_service_id`, `subscription_period`, `price`, `currency_code`) VALUES
(3, 3, 'Year', '10', 'EUR'),
(4, 4, 'Year', '50', 'EUR');

--
-- Dumping data for table `VSUS_PayedServiceSubscriptions`
--

INSERT INTO `VSUS_PayedServiceSubscriptions` (`id`, `user_id`, `payed_service_id`, `date`, `subscription_code`, `subscription_priority`) VALUES
(1, 1, 3, '2022-06-11 21:22:46', 'paid_tablature_store', 1);

--
-- Dumping data for table `WGP_TablatureCategories`
--

INSERT INTO `WGP_TablatureCategories` (`id`, `parent_id`, `taxon_id`, `user_id`) VALUES
(23, NULL, 43, 1),
(31, NULL, 51, 1),
(33, NULL, 54, 6),
(40, NULL, 61, 1),
(44, 40, 65, 1),
(45, 40, 66, 1);

--
-- Dumping data for table `WGP_Tablatures`
--

INSERT INTO `WGP_Tablatures` (`id`, `user_id`, `artist`, `song`, `slug`, `created_at`, `updated_at`, `public`) VALUES
(4, 1, 'Slayer', 'South Of Heaven', 'slayer-south-of-heaven-1', '2022-05-11 04:49:18', '2022-09-19 22:54:09', 0),
(5, 4, 'NightWish', 'Untitled', 'nightwish-untitled', '2022-05-11 04:49:18', '2022-05-11 04:49:18', 1),
(7, 1, 'Slayer', 'South Of Heaven', 'slayer-south-of-heaven', '2022-05-11 07:58:16', '2022-05-11 07:58:16', 1),
(8, 1, 'NightWish', 'The crow, the owl and the dove', 'nightwish-the-crow-the-owl-and-the-dove-8', '2022-05-11 08:10:00', '2022-05-11 17:07:22', 1),
(9, 1, 'Vital Remains', 'Dechristianize', 'vital-remains-dechristianize', '2022-06-10 14:43:27', '2022-08-04 18:53:17', 1),
(10, 1, 'Vital Remains', 'Dechristianize', 'vital-remains-dechristianize-1', '2022-06-12 18:54:28', '2022-06-12 18:54:28', 1),
(11, 1, '3 Doors Down', 'Here Without You', '3-doors-down-here-without-you', '2022-09-21 16:10:06', '2022-09-21 16:10:06', 1),
(12, 6, '3 Doors Down', 'Here Without You', '3-doors-down-here-without-you-1', '2023-01-25 15:47:02', '2023-01-25 15:47:02', 1),
(13, 6, 'Deep Purple', 'Soldier of Fortune', 'deep-purple-soldier-of-fortune', '2023-01-25 15:52:31', '2023-01-25 15:52:31', 1),
(14, 1, 'Consequence', 'Track 1 (Version1)', 'consequence-track-1-version1', '2023-02-28 21:03:44', '2023-02-28 21:03:44', 0),
(15, 1, 'Consequence', 'Track 1 (Version2)', 'consequence-track-1-version2', '2023-02-28 21:04:39', '2023-02-28 21:04:39', 0),
(16, 1, 'Consequence', 'Winter Landscape', 'consequence-winter-landscape', '2023-02-28 21:05:28', '2023-02-28 21:05:28', 0);

--
-- Dumping data for table `WGP_TablatureShares`
--

INSERT INTO `WGP_TablatureShares` (`id`, `owner_id`, `name`) VALUES
(5, 1, 'Test Share');

--
-- Dumping data for table `WGP_TablatureShares_Tablatures`
--

INSERT INTO `WGP_TablatureShares_Tablatures` (`share_id`, `tablature_id`) VALUES
(5, 4);

--
-- Dumping data for table `WGP_Tablatures_Categories`
--

INSERT INTO `WGP_Tablatures_Categories` (`tablature_id`, `category_id`) VALUES
(4, 23),
(9, 31),
(12, 33),
(14, 44),
(15, 44),
(16, 45);

--
-- Dumping data for table `WGP_Tablatures_Files`
--

INSERT INTO `WGP_Tablatures_Files` (`id`, `owner_id`, `type`, `path`, `original_name`) VALUES
(2, 4, 'application/octet-stream', '41/4d/fb5c82f9fb694bc1ab4ceb4774b2.bin', 'SoundOfHeaven.gp3'),
(3, 5, 'application/octet-stream', '7a/c2/820182672a436886c6e094143551.bin', 'NightWish.gp5'),
(5, 7, 'application/octet-stream', 'e2/30/9edd7a102618488702c7b62d1fc4.bin', 'SoundOfHeaven.gp3'),
(6, 8, 'application/octet-stream', 'd7/1a/ba77166a83f99dd36f8a4398f0f0.bin', 'NightWish.gp5'),
(7, 9, 'application/octet-stream', 'd3/c7/eedfbf813ebfb9d2e059657e4209.bin', 'vital_remains_dechristianize.gp4'),
(8, 10, 'application/octet-stream', '5a/5f/97d2e611a9615fecfac5e403e09b.bin', 'vital_remains_dechristianize.gp4'),
(9, 11, 'application/octet-stream', 'd3/30/23a1f1c87d5e195fc2978f7890b6.bin', '3_doors_down_here_without_you.gp4'),
(10, 12, 'application/octet-stream', '8e/4f/c7097389c8d18745c21c4e08d5a2.bin', '3_doors_down_here_without_you.gp4'),
(11, 13, 'application/octet-stream', 'e9/01/dc4543656beae534a0f7f4df6709.bin', 'Deep Purple - Soldier Of Fortune.gp3'),
(12, 14, 'application/octet-stream', '6a/11/7bbb7558de816535e2c1274d6c62.bin', 'Track 1 - Version1.gp5'),
(13, 15, 'application/octet-stream', '10/d1/d0875ef4c1d2e5647cf06e719867.bin', 'Track 1 - Version2.gp5'),
(14, 16, 'application/octet-stream', '33/4a/d27f0b856659efb7cd31933c775a.bin', 'winter_landscape.gp5');

--
-- Dumping data for table `WGP_Users_Favorites`
--

INSERT INTO `WGP_Users_Favorites` (`user_id`, `favorite_id`) VALUES
(1, 4);

--
-- Dumping data for table `WGP_Users_TablatureShares`
--

INSERT INTO `WGP_Users_TablatureShares` (`user_id`, `share_id`) VALUES
(2, 5);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
