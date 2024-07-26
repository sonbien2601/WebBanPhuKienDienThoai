-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 17, 2024 lúc 06:43 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mobile_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsp`
--

CREATE TABLE `danhmucsp` (
  `MaDM` int(11) NOT NULL,
  `TenDM` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmucsp`
--

INSERT INTO `danhmucsp` (`MaDM`, `TenDM`) VALUES
(1, 'Tai nghe'),
(2, 'Bàn phím '),
(31, 'Dây sạc Type-C'),
(32, 'Loa '),
(33, 'Củ sạc'),
(34, 'Cường lực');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `maDH` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sdt` varchar(12) NOT NULL,
  `diaChi` varchar(255) NOT NULL,
  `ngayMua` timestamp NOT NULL DEFAULT current_timestamp(),
  `trangThai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`maDH`, `name`, `sdt`, `diaChi`, `ngayMua`, `trangThai`) VALUES
(15, 'Biện Ngọc Tân', '01213455523', 'assda', '2024-07-15 12:06:52', 0),
(17, 'Vacxin', '01213455523', 'assda', '2024-07-15 12:20:01', 3),
(20, 'TIÊM VẮC XIN CHO TRẺ EM', '01213455523', 'assda', '2024-07-15 13:06:04', 4),
(24, 'hhh', 'ggg', 'hhh', '2024-07-17 10:46:11', 3),
(25, 'TIÊM VẮC XIN CHO TRẺ EM', '01213455523', 'assda', '2024-07-17 11:01:04', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang_ct`
--

CREATE TABLE `donhang_ct` (
  `id` int(11) NOT NULL,
  `id_dh` int(11) NOT NULL,
  `giaSP` double(10,2) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang_ct`
--

INSERT INTO `donhang_ct` (`id`, `id_dh`, `giaSP`, `soLuong`, `id_sp`) VALUES
(17, 14, 1000000.00, 1, 20),
(18, 15, 1000000.00, 5, 20),
(19, 16, 1000000.00, 1, 20),
(20, 17, 790000.00, 5, 19),
(21, 18, 1000000.00, 4, 20),
(22, 19, 790000.00, 1, 17),
(23, 20, 790000.00, 5, 19),
(24, 20, 790000.00, 2, 17),
(25, 21, 1000000.00, 3, 20),
(26, 22, 790000.00, 1, 19),
(27, 23, 790000.00, 3, 19),
(28, 24, 790000.00, 1, 17),
(29, 24, 790000.00, 1, 19),
(30, 25, 790000.00, 1, 19);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MaGH` int(11) NOT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `AnhSP` varchar(255) DEFAULT NULL,
  `TenSP` varchar(255) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `GiaSP` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`MaGH`, `MaSP`, `AnhSP`, `TenSP`, `SoLuong`, `GiaSP`) VALUES
(48, 40, '1-1.jpg', 'Bàn Phím Gaming K618 Super Pro Có Dây', 4, 790000.00),
(49, 28, 'FM1-01-scaled.jpg', 'Micro Oneodio FM1 | Micro Thu Âm Condenser Cổng USB', 1, 1.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `MaLoaiSP` int(11) NOT NULL,
  `MaDM` int(11) NOT NULL,
  `TenLoaiSP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`MaLoaiSP`, `MaDM`, `TenLoaiSP`) VALUES
(1, 0, '256gb'),
(9, 0, 'hihih'),
(11, 23, '10 điểm'),
(16, 24, 'thiện'),
(20, 28, 'dê dương'),
(21, 24, '1'),
(22, 24, '2'),
(23, 1, 'Tai nghe Havit'),
(24, 1, 'Tai nghe AKG'),
(25, 1, 'Tai nghe OneOdio'),
(26, 1, 'Tai nghe Sony'),
(27, 1, 'Tai nghe Razer'),
(28, 32, 'Loa Marshall'),
(29, 32, 'Loa Sony'),
(30, 32, 'Loa Beat'),
(31, 32, 'Loa JBL'),
(32, 32, 'Loa Harman Karden'),
(33, 31, 'Dây sạc Anker'),
(34, 0, 'Dây sạc Aukey'),
(35, 0, 'Dây sạc Aukey'),
(36, 31, 'Dây sạc Mophie'),
(37, 31, 'Dây sạc Aukey'),
(38, 31, 'Dây sạc Baesus'),
(39, 31, 'Dây sạc Wekome'),
(40, 34, 'Cường lực KingKong'),
(41, 34, 'Cường lực Eagle'),
(42, 34, 'Cường lực Baesus'),
(43, 34, 'Cường lực Apple'),
(44, 34, 'Cường lực Samsung'),
(45, 33, 'Củ sạc Apple'),
(46, 33, 'Củ sạc Samsung'),
(47, 33, 'Củ sạc Asus'),
(48, 33, 'Củ sạc LG'),
(49, 33, 'Củ sạc Razer'),
(50, 2, 'Bàn phím Edra'),
(51, 2, 'Bàn phím Dareu'),
(52, 2, 'Bàn phím Lenovo'),
(53, 2, 'Bàn phím Hyperwork'),
(54, 0, 'Bàn phím Zagg'),
(55, 2, 'Bàn phím Esport');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` varchar(255) NOT NULL,
  `MaDM` int(11) NOT NULL,
  `MaLoaiSP` int(11) NOT NULL,
  `GiaSP` varchar(255) NOT NULL,
  `GiaKM` varchar(255) NOT NULL,
  `MotaSP` varchar(500) NOT NULL,
  `AnhSP` varchar(255) NOT NULL,
  `AnhMoTa` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `MaDM`, `MaLoaiSP`, `GiaSP`, `GiaKM`, `MotaSP`, `AnhSP`, `AnhMoTa`) VALUES
(17, 'Tai nghe OneOdio Pro AKA', 1, 25, '790000', '600.000', 'Đánh giá chi tiết tai nghe Oneodio Pro 50 chuẩn Hi Res Audio Tai nghe OneOdio Pro 50 là một trong những sản phẩm được ưa chuộng trong phân khúc tai nghe chuyên nghiệp. Với thiết kế đẹp mắt và chất lượng âm thanh tuyệt vời, sản phẩm này đã chiếm được lòng tin của rất nhiều khách hàng trên toàn thế giới. Trong bài viết này', 'Tainghe.jpg', ''),
(18, 'Bàn phím Darue New', 2, 51, '1000000', '800.000', 'Đánh giá chi tiết về bàn phím cơ Bluetooth không dây K68BT Red Switch Ngày nay, bàn phím cơ không chỉ được ưa chuộng bởi những game thủ chuyên nghiệp, mà còn trở thành một lựa chọn phổ biến cho cả người dùng thông thường. Bàn phím cơ Bluetooth không dây K68BT là một sản phẩm đáng chú ý trong danh sách những lựa chọn hàng đầu của người dùng.', 'Banphim.jpg', ''),
(19, 'Cáp sạc Wekome RS1', 31, 39, '790000', '600.000', 'Wekome là một trong top những thương hiệu hàng đầu chuyên về các sản phẩm phụ kiện công nghệ như cáp sạc, tai nghe và pin dự phòng… Không có gì ngạc nhiên khi cáp sạc nhanh Wekome WDC-191 PD 20W Type-C to Lightning được ưa chuộng bởi thiết kế độc đáo và mới lạ, khả năng sạc nhanh chóng cùng nhiều tính năng nổi bật khác. Hãy cùng Seve7 khám phá ngay sau đây!', 'Cap.jpg', ''),
(20, 'Loa Bluetooth Mini Azeada PD-S104', 32, 30, '1000000', '800.000', 'Bạn là tuýp người năng động, thích tụ tập cùng gia đình và bạn bè, thích đi du lịch và trải nghiệm cuộc sống? Trong những buổi vui chơi này không thể thiếu những bữa tiệc âm nhạc, bạn cần một mẫu loa bluetooth có thể mang theo mọi lúc mọi nơi, Loa Bluetooth Mini Azeada PD-S104 sinh ra chính là dành cho bạn. Một chiếc loa siêu nhỏ gọn, công nghệ âm thanh vượt trội và cải tiến rất nhiều tính năng…', 'Loa.png', ''),
(21, 'Củ sạc Conffetto 20W', 33, 49, '790.000', '600.000', 'Sạc siêu nhanh lên tới 1000%, sạc 1 lần dùng mãi mãi đến giá, để lại cho con cháu sạc cũng được, nên mua hehe', 'cusac.png', ''),
(22, 'Cường lực KingKong', 34, 40, '1.000.000', '600.000', 'Mặc dù những dòng iPhone đời mới đều được Apple trang bị màn hình kính có độ chống trầy xước, nứt vỡ cao hơn trước. Tuy nhiên, nó không thể nào chịu được những tác động mạnh từ bên ngoài. Chính vì vậy, trang bị kính cường lực chính là phương án tốt nhất để bảo vệ màn hình iPhone và giữ nguyên vẻ đẹp của máy.', 'cl.jpeg', ''),
(23, 'Củ sạc Remax 20W', 33, 48, '790.000', '800.000', 'sạc siêu nhanh', 'cu-sac-nhanh-2-cong-20w-remax-rp-u101-1-05072024.jpg', ''),
(24, 'Cường lực Iphone', 34, 43, '1.000.000', '600.000', 'Siêu cứng như đá', 'kinh-cuong-luc-iphone-12h-sieu-cung-2-30052019.jpg', ''),
(25, 'Tai Nghe Seve7 F2 Plus TWS | Bluetooth V5.3', 1, 23, '790.000', '800.000', 'Tai nghe Bluetooth TWS Seve7 F2 Plus – Kết nối Bluetooth V5.3, Driver 13mm, Âm thanh sống động, Nghe nhạc lên đến 30h Mang tiềm năng sáng tạo vô tận với thiết kế độc đáo và chất âm ấn tượng, tai nghe Bluetooth TWS Seve7 F2 Plus sẵn sàng khơi nguồn cảm hứng và nâng tầm bản nhạc nghệ thuật mà bạn nghe. Cùng bạn đồng hành trong mọi không gian làm việc và giải trí. ', 'tn.jpg', ''),
(26, 'Tai Nghe OneOdio A10 Focus Bluetooth 5.0 Chống Ồn Chủ Động ANC', 1, 25, '1.000.000', '600.000', 'Tai Nghe OneOdio A10 Focus Bluetooth – Driver 40mm, Bluetooth 5.0, Chống ồn chủ động ANC cực tốt, Thời lượng pin lên tới 65h Thương hiệu sản xuất tai nghe chuyên nghiệp OneOdio ra mắt sản phẩm Tai nghe Headphone Bluetooth OneOdio A10 Focus với công nghệ chống ồn ANC hiện đại chưa từng thấy. Hãy cùng OneOdio A10 đắm chìm trong thế giới âm nhạc của riêng bạn. TAI NGHE BLUETOOTH HEADPHONE ONEODIO…\r\n', 'oneodio-A10-ma-moi-800-09.jpg', ''),
(27, 'Tai Nghe Oneodio Pro 50 | Hi-Res | Wires – Space Grey', 1, 25, '790.000', '600.000', 'Đánh giá chi tiết tai nghe Oneodio Pro 50 chuẩn Hi Res Audio Tai nghe OneOdio Pro 50 là một trong những sản phẩm được ưa chuộng trong phân khúc tai nghe chuyên nghiệp. Với thiết kế đẹp mắt và chất lượng âm thanh tuyệt vời, sản phẩm này đã chiếm được lòng tin của rất nhiều khách hàng trên toàn thế giới. Trong bài viết này, chúng ta sẽ phân tích và đánh giá chi tiết về tai nghe OneOdio Pro 50', 'OneOdio-Studio-C-Pro-50-06.jpg', ''),
(28, 'Micro Oneodio FM1 | Micro Thu Âm Condenser Cổng USB', 32, 29, '1.000.000', '600.000', 'Micro Oneodio FM1 – Thiết kế bền bỉ chắc chắn, Thu âm định hướng Cardioid, Âm thanh có độ phân giải cao, Trang bị màng lọc âm Pop Filter và mic gain, Tương thích nhiều thiết bị OneOdio FM1 là một loại Micro Condenser được thiết kế dành cho các hoạt động thu âm chuyên nghiệp. Như phát sóng trực tiếp, thu âm trong phòng thu và chơi game. Cung cấp âm thanh tần số thấp chất lượng cao và chất lượng …', 'FM1-01-scaled.jpg', ''),
(29, 'Dây Cáp Âm Thanh 3.5mm Kèm Mic Audio Dài 1.5m', 32, 31, '790.000', '600.000', 'Cáp Audio 3.5mm kèm Mic dài 1.5m dễ dàng kết nối mọi thiết bị âm thanh qua cổng 3.5mm Có thể thấy hầu như các thiết bị điện thoại, máy tính bảng, máy nghe nhạc, TV, xe oto… trên thị trường đều sở hữu jack cắm kết nối âm thanh chính là cổng 3.5mm. Thấy được điều này, Seven giới thiệu đến bạn dây cáp âm thanh 3.5mm kèm Mic Audio dài 1.5m với khả năng kết nối mọi thiết bị âm thanh qua cổng 3.5mm. …', 'list-new-28.jpg', ''),
(30, 'OneOdio OpenRock S | Tai Nghe Bluetooth Thể Thao Chống Nước IPX5', 32, 30, '790.000', '600.000', 'Tai nghe OneOdio OpenRock S – Bluetooth 5.3, Công nghệ TubeBass, Kháng nước IPX5, Thời lượng pin lên đến 60h, Micro khử ồn Tai nghe OneOdio OpenRock S là tai nghe dạng mở thế hệ mới của OneOdio với nhiều ưu điểm vượt trội. Cả về thiết kế, chất lượng âm thanh, thời lượng pin cho đến các công nghệ hiện đại được sử dụng. Hãy cùng Seven khám phá những điểm nổi bật của tai nghe OneOdio OpenRock S ng…', '1-1.png', ''),
(31, 'Cáp Sạc Nhanh 2in1 Azeada PD-B73th 100W Type-C to C/L ', 31, 36, '790.000', '600.000', 'Cáp sạc nhanh 2in1 Azeada PD-B73th là lựa chọn lý tưởng cho người dùng đa thiết bị. Cáp sạc được thiết kế đa năng với 2 đầu ra Type-C và Lightning cho khả năng sạc truyền dữ liệu nhanh chóng. Mang theo khi đi học, đi làm hay đi du lịch đều vô cùng tiện lợi. Ngay bây giờ, hãy cùng tìm hiểu chi tiết hơn về chiếc cáp sạc siêu tiện ích này nhé! THIẾT KẾ BỀN BỈ VÀ CHẮC CHẮN Điểm nhấn đầu tiên phải k…', 'Draft-Seve7.png', ''),
(32, 'Cáp sạc nhanh Type-C to Lightning Azeada 27W 1.3M', 31, 39, '1000000', '22222', 'Cáp sạc nhanh Type-C to Lightning Azeada 27W chính là một sản phẩm dây cáp USB-C dành cho các dòng sản phẩm của Apple đang hot nhất trên thị trường hiện nay. Sở hữu cấu trúc tối ưu toàn diện mới, sự bền bỉ và khả năng hỗ trợ sạc nhanh đã giúp cho sản phẩm được nhiều người ưa chuộng. Hãy cùng Seve7 khám phá các ưu điểm nổi bật của cáp sạc này nhé! Thiết kế cao cấp tối ưu cùng cấu tạo bền bỉ Cáp…\r\n', 'Untitled-1-02-2.jpg', ''),
(33, 'Cáp sạc USB to Lightning cho iPhone chuẩn MFI – 1M', 31, 38, '790000', '22222', 'Cáp sạc USB to Lightning Au chính hãng là sản phẩm chất lượng cao được sản xuất bởi thương hiệu nổi tiếng trong ngành công nghệ – Au. Đây là một trong những sản phẩm được nhiều người tin dùng để sạc cho các thiết bị của Apple như iPhone, iPad và iPod. Về thiết kế, cáp sạc USB to Lightning Au chính hãng được làm từ chất liệu bền, đảm bảo độ bền cao và khả năng chịu lực tốt. Dây cáp có chi…', 'anh-chup-cap-sac-A-to-L-hong-Nhat-16.jpg', ''),
(34, 'Kính Cường Lực Chống Nhìn Trộm KingKong', 34, 42, '790000', '22222', 'Tại sao bạn nên sử dụng kính cường lực chống nhìn trộm KingKong? Thời đại công nghệ số phát triển, khi đăng kí một dịch vụ nào đó. Bạn đều phải chấp nhận cho đơn vị cung cấp thu thập và sử dụng dữ liệu của bạn. Vì vậy, việc bảo mật thông tin cá nhân rất quan trọng. Và nếu như không cẩn thận, có thể sẽ có rất nhiều người nhòm ngó đấy. Nhận thấy điều đó, Seven mang đến cho người dùng giải pháp đó…', 'list-new-115.jpg', ''),
(35, 'Kính Cường Lực Elephant Cho iPhone', 34, 41, '790000', '22222', 'Nếu bạn đã từng dùng iPhone thì chắc chắn bạn đã từng mua kính cường lực để bảo vệ màn hình cho chiếc điện thoại của mình. Nhưng bạn đã từng mua được kính cường lực loại tốt nhất chưa? Tại Seve7 luôn sẵn mẫu kính cường lực cao cấp nhất, tốt nhất để các bạn có thể trải nghiệm tốt hơn. Vì sao bạn nên chọn Seve7 ♥ Bảo hành đổi mới trong 06 tháng – 1 đổi 1 – dễ dàng đổi trả. Chăm sóc khách hàng …', 'list-new-143.jpg', ''),
(36, 'Củ Sạc Nhanh Wekome WP-U146 PD 20W 2 Cổng', 33, 46, '790000', '22222', 'Wekome là một trong top những thương hiệu hàng đầu chuyên về các sản phẩm phụ kiện công nghệ như cáp sạc, tai nghe và pin dự phòng… Không có gì ngạc nhiên khi củ sạc nhanh Wekome WP-U146 PD 20W được ưa chuộng bởi thiết kế độc đáo và mới lạ, khả năng sạc nhanh chóng cùng nhiều tính năng nổi bật khác. Hãy cùng Seve7 khám phá ngay sau đây! THIẾT KẾ ĐỘC ĐÁO VÀ PHONG CÁCH  Củ sạc nhanh Wekome WP-U…', '19.08.1-01.jpg', ''),
(37, 'Củ Sạc Nhanh Wekome WP-U55 PD 20W Type-C', 33, 47, '790000', '22222', 'Có thể nói USB-C đang là tương lai của công nghiệp kết nối hiện nay khi hầu hết các thiết bị đều đang chuyển dần sang cổng USB-C. Và không nằm ngoài xu hướng đó, Wekome mang đến Củ sạc nhanh Wekome WP-U55 PD 20W Type-C. Đặc trưng với phong cách trẻ trung, thiết kế thời trang mà vẫn thông minh tiện lợi. Đáp ứng mọi nhu cầu cần thiết của người dùng. Thiết kế nhỏ gọn, chất liệu cao cấp Củ sạc nhan…', '22.08.1-02.jpg', ''),
(38, 'Bàn Phím Cơ Không Dây K87BT LED RGB', 2, 52, '790000', '22222', 'Đánh Giá Sản Phẩm: Bàn Phím Cơ Không Dây K87BT LED RGB Bạn là tín đồ của dòng bàn phím cơ nhưng thích mẫu bàn phím nhỏ gọn, tiện lợi. Vậy K87BT sẽ là sản phẩm bàn phím cơ kết nối bluetooth không dây cực kỳ phù hợp dành cho bạn! Cùng với sự phát triển của công nghệ nói chung và ngành sản xuất sản phẩm máy tính, chuột, bàn phím,…nói riêng, bàn phím cơ không dây K87BT là một bước cải tiến mới đố…', '1-2.jpg', ''),
(39, 'Chuột Văn Phòng Có Dây Havit MS72 RGB LED', 2, 50, '1000000', '22222', 'Chuột Văn Phòng Có Dây Havit MS72 RGB LED –  Độ nhạy lên đến 1200 DPI, có đèn RGB, bảo hành chính hãng 12 tháng Chuột văn phòng Havit MS72 sở hữu thiết kế công thái học tiện dụng. Kết hợp với dải đèn RGB cho hiệu ứng nhiều màu sắc, nổi bật và cực thời trang. Độ nhạy lên đến 1200 DPI, dễ dàng điều chỉnh tương ứng với nhu cầu sử dụng. Sở hữu mức giá cực “hạt rẻ”, chuột Havit MS72 phù hợp với học …', 'list-new-12.jpeg', ''),
(40, 'Bàn Phím Gaming K618 Super Pro Có Dây', 2, 50, '790000', '22222', 'Đánh giá sản phẩm: Bàn phím Gaming K618 Super Pro Có Dây Bạn là một game thủ bạn muốn có cảm giác gõ tốt của trên một chiếc bàn phím cơ, tuy nhiên bạn lại không có qua nhiều tiền. Bàn Phím Gaming K618 Super Pro có dây sẽ là một lựa chọn tuyệt vời dành cho bạn, một chiếc bàn phím ngang bàn phím cơ có đầy đủ tính năng của những sản phẩm đắt tiền nhưng lại có mức giá vô cùng dễ tiếp cận. Trong bài…', '1-1.jpg', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_anhmota`
--

CREATE TABLE `tbl_anhmota` (
  `MaSP` int(11) NOT NULL,
  `AnhMoTa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_anhmota`
--

INSERT INTO `tbl_anhmota` (`MaSP`, `AnhMoTa`) VALUES
(17, 'Tainghe.jpg'),
(17, 'tainghenho.jpg'),
(17, 'tainghenho1.jpg'),
(18, 'Banphimnho1.jpg'),
(18, 'Banphimnho2.jpg'),
(18, 'Banphimnho3.jpg'),
(19, 'cap1.jpg'),
(19, 'cap2.jpg'),
(19, 'cap3.jpg'),
(20, 'Loanho1.png'),
(20, 'Loanho2.png'),
(20, 'Loanho3.png'),
(21, 'cusac1.jpg'),
(21, 'cusac2.jpg'),
(21, 'cusac3.jpg'),
(22, 'cl1.jpg'),
(22, 'cl2.jpg'),
(22, 'cl3.jpg'),
(23, 'cusac3.jpg'),
(23, 'cu-sac-nhanh-2-cong-20w-remax-rp-u101-2-05072024.jpg'),
(23, 'cu-sac-nhanh-2-cong-20w-remax-rp-u101-5-05072024.jpg'),
(24, 'kinh-cuong-luc-iphone-12h-sieu-cung-3-30052019.jpg'),
(24, 'kinh-cuong-luc-king-kong-iphone-x-slide1-25122018.jpg'),
(24, 'kinh-cuong-luc-king-kong-iphone-x-slide2-25122018.jpg'),
(25, 'picture2.jpg'),
(25, 'picture3.jpg'),
(25, 'picture4.jpg'),
(26, '1024x576-03-7-scaled.jpg'),
(26, '1024x576-04-7-scaled.jpg'),
(26, '1024x576-05-5-scaled.jpg'),
(27, 'OneOdio-Studio-C-Pro-50-07.jpg'),
(27, 'OneOdio-Studio-C-Pro-50-10 (1).jpg'),
(27, 'OneOdio-Studio-C-Pro-50-10.jpg'),
(28, 'FM1-02-scaled.jpg'),
(28, 'FM1-03-scaled.jpg'),
(28, 'FM1-10-scaled.jpg'),
(29, '1024x576-04-7-scaled.jpg'),
(29, '1024x576-05-1-scaled (1).jpg'),
(29, '1024x576-06-1-scaled.jpg'),
(30, '2-1.png'),
(30, '3-1.png'),
(30, '5.jpg'),
(31, '06.09.3-01.jpg'),
(31, '06.09.3-09.jpg'),
(31, '06.09.3-10.jpg'),
(32, 'Azeada-Lotto-series-data-cable-PD-B89-C-L27W-03.jpg'),
(32, 'Azeada-Lotto-series-data-cable-PD-B89-C-L27W-06.jpg'),
(32, 'cusac.png'),
(33, 'cap-sac-A-to-L-hong-Nhat-01.jpg'),
(33, 'cap-sac-A-to-L-hong-Nhat-02.jpg'),
(33, 'cap-sac-A-to-L-hong-Nhat-03.jpg'),
(34, 'kingking4.png'),
(34, 'kingkong3.png'),
(34, 'list-new-115 (1).jpg'),
(35, '2.jpg'),
(35, 'list-new-115 (1).jpg'),
(35, 'list-new-115.jpg'),
(36, '19.08.1-01.jpg'),
(36, '19.08.1-06.jpg'),
(36, '19.08.1-08 (1).jpg'),
(37, '22.08.1-03.jpg'),
(37, '22.08.1-04 (1).jpg'),
(37, '22.08.1-04.jpg'),
(37, '22.08.1-04 (1) - Copy.jpg'),
(38, '2-2.jpg'),
(38, '3-2.jpg'),
(38, '4-2.jpg'),
(39, '800x800-03-6-scaled.jpg'),
(39, '800x800-04-5-scaled.jpg'),
(39, '800x800-06-8-scaled.jpg'),
(40, '1-1 (1).jpg'),
(40, '1-2.jpg'),
(40, '2 (1).jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthaidonhang`
--

CREATE TABLE `trangthaidonhang` (
  `id` int(11) NOT NULL,
  `maDH` int(11) DEFAULT NULL,
  `trangThai` int(11) DEFAULT NULL,
  `ngayCapNhat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expires` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`, `reset_token`, `reset_token_expires`) VALUES
(1, 'sonbien', '$2y$10$DYb9INJFKRu0vXR6cqequumJktk7vz/rlwh0NXPDEVN3E0p0nllMC', 0, 'vaitroll600lce@gmail.com', NULL, NULL),
(2, 'thien', '$2y$10$ucB6br/vmhePtOdgGCe.X.RotqQT9sXxaxRYnIbhK3cGhXxUUr0cK', 1, 'thien@gmail.com', NULL, NULL),
(3, 'khoa', '$2y$10$aRMAzSS3nwcIWYz7iDzdAOHApgtzOKZw7CUy2f/y757K6RflJ3qCu', 0, 'khoa@gmail.com', NULL, NULL),
(4, 'Duong', '$2y$10$kx2wn7fM3ls1FJJ1dmy3Wux33/xc8chDgLEKvwiaVAPkn7D.tYDMi', 0, 'duognsjk@gmail.com', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmucsp`
--
ALTER TABLE `danhmucsp`
  ADD PRIMARY KEY (`MaDM`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`maDH`);

--
-- Chỉ mục cho bảng `donhang_ct`
--
ALTER TABLE `donhang_ct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MaGH`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`MaLoaiSP`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`);

--
-- Chỉ mục cho bảng `trangthaidonhang`
--
ALTER TABLE `trangthaidonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maDH` (`maDH`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_username` (`username`),
  ADD KEY `idx_email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmucsp`
--
ALTER TABLE `danhmucsp`
  MODIFY `MaDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `maDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `donhang_ct`
--
ALTER TABLE `donhang_ct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MaGH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `MaLoaiSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `trangthaidonhang`
--
ALTER TABLE `trangthaidonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Các ràng buộc cho bảng `trangthaidonhang`
--
ALTER TABLE `trangthaidonhang`
  ADD CONSTRAINT `trangthaidonhang_ibfk_1` FOREIGN KEY (`maDH`) REFERENCES `donhang` (`maDH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
