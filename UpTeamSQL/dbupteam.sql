--
-- Database: `dbupteam`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `lastName` varchar(250) NOT NULL,
  `CPF` varchar(11) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL,
  `birthday` date NOT NULL,
  `experience` int(11) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `trophies` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`ID`, `Name`, `lastName`, `CPF`, `Password`, `email`, `role`, `birthday`, `experience`, `alias`, `trophies`, `level`, `active`) VALUES
(1, 'Vinicius', 'Campos', '04870687186', '12345', '2@2.com', 'swordman', '1995-10-11', 4, 'kazhuya', 4, 5, 0),
(2, 'Vinicius', 'Campos', '10020030088', '12345', '2@2.com', 'swordman', '1995-10-11', 4, 'kazhuya', 4, 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CPF` (`CPF`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
