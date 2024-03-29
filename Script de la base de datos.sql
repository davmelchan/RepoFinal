USE [master]
GO
/****** Object:  Database [proyecto_final]    Script Date: 11/3/2024 08:07:16 ******/
CREATE DATABASE [proyecto_final] ON  PRIMARY 
( NAME = N'proyecto_final', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.DAVE\MSSQL\DATA\proyecto_final.mdf' , SIZE = 73728KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'proyecto_final_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.DAVE\MSSQL\DATA\proyecto_final_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [proyecto_final].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [proyecto_final] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [proyecto_final] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [proyecto_final] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [proyecto_final] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [proyecto_final] SET ARITHABORT OFF 
GO
ALTER DATABASE [proyecto_final] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [proyecto_final] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [proyecto_final] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [proyecto_final] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [proyecto_final] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [proyecto_final] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [proyecto_final] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [proyecto_final] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [proyecto_final] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [proyecto_final] SET  ENABLE_BROKER 
GO
ALTER DATABASE [proyecto_final] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [proyecto_final] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [proyecto_final] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [proyecto_final] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [proyecto_final] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [proyecto_final] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [proyecto_final] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [proyecto_final] SET RECOVERY FULL 
GO
ALTER DATABASE [proyecto_final] SET  MULTI_USER 
GO
ALTER DATABASE [proyecto_final] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [proyecto_final] SET DB_CHAINING OFF 
GO
EXEC sys.sp_db_vardecimal_storage_format N'proyecto_final', N'ON'
GO
USE [proyecto_final]
GO
/****** Object:  Table [dbo].[Cat_evaluacion]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Cat_evaluacion](
	[IdCatEvaluacion] [int] IDENTITY(1,1) NOT NULL,
	[Nombre] [nvarchar](50) NOT NULL,
	[Estado] [bit] NOT NULL,
 CONSTRAINT [PK_Cat_evaluacion] PRIMARY KEY CLUSTERED 
(
	[IdCatEvaluacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Cat_supervision]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Cat_supervision](
	[IdCatSupervision] [int] IDENTITY(1,1) NOT NULL,
	[Nombre] [nvarchar](50) NOT NULL,
	[Estado] [bit] NOT NULL,
 CONSTRAINT [PK_Cat_supervision] PRIMARY KEY CLUSTERED 
(
	[IdCatSupervision] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Estudiante]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Estudiante](
	[Identificacion] [nvarchar](255) NOT NULL,
	[Nombres] [nvarchar](50) NOT NULL,
	[Apellidos] [nvarchar](50) NOT NULL,
	[Direccion] [nvarchar](max) NOT NULL,
	[idGenero] [int] NOT NULL,
	[idEmpresa] [int] NULL,
	[idGrupo] [nvarchar](255) NULL,
	[rutaImagen] [nvarchar](max) NULL,
	[Estado] [nchar](10) NOT NULL,
	[Telefono] [nvarchar](9) NOT NULL,
 CONSTRAINT [PK_Estudiante] PRIMARY KEY CLUSTERED 
(
	[Identificacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[EvaluacionCentro]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[EvaluacionCentro](
	[idEvaluacionCentro] [int] IDENTITY(1,1) NOT NULL,
	[IdEstudiante] [nvarchar](255) NOT NULL,
	[IdMaestro] [nvarchar](255) NOT NULL,
	[IdEmpresa] [int] NOT NULL,
	[FechaInicio] [date] NOT NULL,
	[FechaFinal] [date] NOT NULL,
	[Nota] [int] NOT NULL,
 CONSTRAINT [PK_EvaluacionCentro] PRIMARY KEY CLUSTERED 
(
	[idEvaluacionCentro] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[EvaluacionesXMaestro]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[EvaluacionesXMaestro](
	[idEvaluacionXMaestro] [int] IDENTITY(1,1) NOT NULL,
	[IdEvaluacion] [int] NOT NULL,
	[MaestroId] [nvarchar](255) NOT NULL,
	[Estado] [bit] NOT NULL,
 CONSTRAINT [PK_EvaluacionesXMaestro] PRIMARY KEY CLUSTERED 
(
	[idEvaluacionXMaestro] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[EvaluacionXNotas]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[EvaluacionXNotas](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[idEstudiante] [nvarchar](255) NOT NULL,
	[idEvaluacion] [int] NOT NULL,
	[nota] [int] NOT NULL,
 CONSTRAINT [PK_EvaluacionXNotas] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Evidencias_Tb]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Evidencias_Tb](
	[idEvidencia] [int] IDENTITY(1,1) NOT NULL,
	[Nombre] [nvarchar](255) NOT NULL,
	[Descripcion] [nvarchar](max) NOT NULL,
	[idEmpresa] [int] NOT NULL,
	[Fecha] [date] NOT NULL,
	[RutaArchivo] [nvarchar](max) NOT NULL,
	[Estado] [bit] NOT NULL,
	[NombreArchivo] [nvarchar](max) NOT NULL,
 CONSTRAINT [PK_Evidencias_Tb] PRIMARY KEY CLUSTERED 
(
	[idEvidencia] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[EvidenciasXEstudiante]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[EvidenciasXEstudiante](
	[IdEvidenciaXEstudiante] [int] IDENTITY(1,1) NOT NULL,
	[idEvidencia] [int] NOT NULL,
	[idEstudiante] [nvarchar](255) NOT NULL,
	[Estado] [bit] NOT NULL,
 CONSTRAINT [PK_EvidenciasXEstudiante] PRIMARY KEY CLUSTERED 
(
	[IdEvidenciaXEstudiante] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Grupos]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Grupos](
	[Identificacion] [nvarchar](255) NOT NULL,
	[Nombre] [nvarchar](50) NOT NULL,
	[RutaImagen] [nvarchar](max) NULL,
	[Estado] [bit] NOT NULL,
 CONSTRAINT [PK_Grupos] PRIMARY KEY CLUSTERED 
(
	[Identificacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[GrupoTb]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[GrupoTb](
	[IdGrupo] [nvarchar](255) NOT NULL,
	[Nombre] [nvarchar](250) NOT NULL,
	[Estado] [bit] NOT NULL,
	[RutaImagen] [nvarchar](max) NULL,
 CONSTRAINT [PK_GrupoTb] PRIMARY KEY CLUSTERED 
(
	[IdGrupo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[GrupoXMaestro]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[GrupoXMaestro](
	[IdGrupo] [nvarchar](255) NOT NULL,
	[IdMaestro] [nvarchar](255) NOT NULL,
	[Estado] [bit] NOT NULL,
	[IdgrupoMaestro] [int] IDENTITY(1,1) NOT NULL,
 CONSTRAINT [PK_GrupoXMaestro] PRIMARY KEY CLUSTERED 
(
	[IdgrupoMaestro] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Maestro]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Maestro](
	[Identificacion] [nvarchar](255) NOT NULL,
	[especialidad] [nvarchar](max) NOT NULL,
	[idGenero] [int] NOT NULL,
	[FotoRuta] [nvarchar](max) NULL,
	[Estado] [bit] NOT NULL,
	[Nombres] [nvarchar](max) NOT NULL,
	[Apellidos] [nvarchar](max) NOT NULL,
 CONSTRAINT [PK_Maestro] PRIMARY KEY CLUSTERED 
(
	[Identificacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[migrations]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[migrations](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[migration] [nvarchar](255) NOT NULL,
	[batch] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Permisos]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Permisos](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[NombrePermiso] [nvarchar](max) NOT NULL,
	[Ruta] [nvarchar](max) NOT NULL,
	[Icono] [nvarchar](max) NOT NULL,
	[Titulo] [nvarchar](500) NULL,
	[page] [nvarchar](max) NULL,
 CONSTRAINT [PK_Permisos] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[personal_access_tokens]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[personal_access_tokens](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[tokenable_type] [nvarchar](255) NOT NULL,
	[tokenable_id] [bigint] NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[token] [nvarchar](64) NOT NULL,
	[abilities] [nvarchar](max) NULL,
	[last_used_at] [datetime] NULL,
	[expires_at] [datetime] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Procesos]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Procesos](
	[IdProceso] [int] IDENTITY(1,1) NOT NULL,
	[NombreProceso] [nvarchar](max) NOT NULL,
	[Ruta] [nvarchar](max) NOT NULL,
 CONSTRAINT [PK_Procesos] PRIMARY KEY CLUSTERED 
(
	[IdProceso] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[ProcesoXPermiso]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ProcesoXPermiso](
	[IdProcesoXPermiso] [int] IDENTITY(1,1) NOT NULL,
	[Proceso_Id] [int] NOT NULL,
	[Permiso_Id] [int] NOT NULL,
 CONSTRAINT [PK_ProcesoXPermiso] PRIMARY KEY CLUSTERED 
(
	[IdProcesoXPermiso] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[ReportesTb]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ReportesTb](
	[IdReporte] [int] IDENTITY(1,1) NOT NULL,
	[IdAlumno] [nvarchar](255) NOT NULL,
	[IdMaestro] [nvarchar](255) NOT NULL,
	[HoraEntrada] [nvarchar](100) NOT NULL,
	[HoraSalida] [nvarchar](100) NOT NULL,
	[Observacion] [nvarchar](max) NOT NULL,
	[Area] [nvarchar](200) NOT NULL,
	[RolAsignado] [nvarchar](200) NOT NULL,
	[HorasPracticas] [nvarchar](100) NULL,
	[Departamento] [nvarchar](100) NULL,
	[Coordinador] [nvarchar](255) NULL,
 CONSTRAINT [PK_ReportesTb] PRIMARY KEY CLUSTERED 
(
	[IdReporte] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Roles]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Roles](
	[IdRol] [int] IDENTITY(1,1) NOT NULL,
	[Nombre] [nvarchar](50) NOT NULL,
	[Estado] [bit] NOT NULL,
 CONSTRAINT [PK_Roles] PRIMARY KEY CLUSTERED 
(
	[IdRol] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[RolesXPermisos]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[RolesXPermisos](
	[idRolesXPermisos] [int] IDENTITY(1,1) NOT NULL,
	[Permisos_Id] [int] NOT NULL,
	[Roles_id] [int] NOT NULL,
 CONSTRAINT [PK_RolesXPermisos] PRIMARY KEY CLUSTERED 
(
	[idRolesXPermisos] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Supervision_Tb]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Supervision_Tb](
	[idSupervision] [int] IDENTITY(1,1) NOT NULL,
	[idEstudiante] [nvarchar](255) NOT NULL,
	[idDocente] [nvarchar](255) NOT NULL,
	[idEmpresa] [int] NOT NULL,
	[FechaSupervision] [datetime] NOT NULL,
	[Observacion] [nvarchar](max) NOT NULL,
	[Estado] [bit] NOT NULL,
	[IdTipoSupervision] [int] NOT NULL,
 CONSTRAINT [PK_Supervision_Tb] PRIMARY KEY CLUSTERED 
(
	[idSupervision] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Tb_empresa]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Tb_empresa](
	[IdEmpresa] [int] IDENTITY(1,1) NOT NULL,
	[Nombre] [nvarchar](50) NOT NULL,
	[Descripcion] [nvarchar](max) NOT NULL,
	[Responsable] [nvarchar](50) NOT NULL,
	[Estado] [bit] NOT NULL,
	[TelResponsable] [nvarchar](10) NULL,
 CONSTRAINT [PK_Tb_empresa] PRIMARY KEY CLUSTERED 
(
	[IdEmpresa] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Tb_Evaluaciones]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Tb_Evaluaciones](
	[IdEvaluacion] [int] IDENTITY(1,1) NOT NULL,
	[Nombre] [nvarchar](50) NOT NULL,
	[Descripcion] [nvarchar](max) NOT NULL,
	[IdUnidad] [int] NOT NULL,
	[IdTipo] [int] NOT NULL,
	[IdGrupo] [nvarchar](255) NOT NULL,
	[FechaCreacion] [datetime] NOT NULL,
	[Estado] [bit] NOT NULL,
	[Puntaje] [int] NULL,
 CONSTRAINT [PK_Tb_Evaluaciones] PRIMARY KEY CLUSTERED 
(
	[IdEvaluacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Tb_genero]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Tb_genero](
	[IdGenero] [int] IDENTITY(1,1) NOT NULL,
	[Nombre] [nvarchar](50) NOT NULL,
	[Estado] [bit] NOT NULL,
 CONSTRAINT [PK_Tb_genero] PRIMARY KEY CLUSTERED 
(
	[IdGenero] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Tb_Tracker]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Tb_Tracker](
	[IdTracker] [int] IDENTITY(1,1) NOT NULL,
	[Titulo] [nvarchar](255) NOT NULL,
	[Estado] [nvarchar](255) NOT NULL,
	[Activo] [bit] NOT NULL,
	[IdEstudiante] [nvarchar](255) NOT NULL,
	[FechaInicio] [date] NOT NULL,
	[FechaFinalizacion] [date] NOT NULL,
 CONSTRAINT [PK_Tb_Tracker] PRIMARY KEY CLUSTERED 
(
	[IdTracker] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Tb_unidad]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Tb_unidad](
	[IdUnidad] [int] IDENTITY(1,1) NOT NULL,
	[Nombre] [nvarchar](50) NOT NULL,
	[Estado] [bit] NOT NULL,
 CONSTRAINT [PK_Tb_unidad] PRIMARY KEY CLUSTERED 
(
	[IdUnidad] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Tracker_Evidencia]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Tracker_Evidencia](
	[IdTracker] [int] IDENTITY(1,1) NOT NULL,
	[TrackerId] [int] NOT NULL,
	[EvidenciaId] [int] NOT NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[usuario]    Script Date: 11/3/2024 08:07:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[usuario](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[Identificacion] [nvarchar](255) NOT NULL,
	[password] [nvarchar](max) NOT NULL,
	[FechaCreacion] [datetime] NOT NULL,
	[Estado] [bit] NOT NULL,
	[IdRol] [int] NOT NULL,
 CONSTRAINT [PK_Usuario_1] PRIMARY KEY CLUSTERED 
(
	[Identificacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[Cat_evaluacion] ON 

INSERT [dbo].[Cat_evaluacion] ([IdCatEvaluacion], [Nombre], [Estado]) VALUES (1, N'Conceptuales', 1)
INSERT [dbo].[Cat_evaluacion] ([IdCatEvaluacion], [Nombre], [Estado]) VALUES (2, N'Procedimentales', 1)
INSERT [dbo].[Cat_evaluacion] ([IdCatEvaluacion], [Nombre], [Estado]) VALUES (3, N'ffffff', 0)
INSERT [dbo].[Cat_evaluacion] ([IdCatEvaluacion], [Nombre], [Estado]) VALUES (4, N'Ornamental', 0)
INSERT [dbo].[Cat_evaluacion] ([IdCatEvaluacion], [Nombre], [Estado]) VALUES (5, N'Actitudinales', 1)
INSERT [dbo].[Cat_evaluacion] ([IdCatEvaluacion], [Nombre], [Estado]) VALUES (6, N'Pensamiento', 0)
INSERT [dbo].[Cat_evaluacion] ([IdCatEvaluacion], [Nombre], [Estado]) VALUES (7, N'Cerca', 0)
SET IDENTITY_INSERT [dbo].[Cat_evaluacion] OFF
GO
SET IDENTITY_INSERT [dbo].[Cat_supervision] ON 

INSERT [dbo].[Cat_supervision] ([IdCatSupervision], [Nombre], [Estado]) VALUES (1, N'Presencial', 1)
INSERT [dbo].[Cat_supervision] ([IdCatSupervision], [Nombre], [Estado]) VALUES (2, N'No presencial', 0)
INSERT [dbo].[Cat_supervision] ([IdCatSupervision], [Nombre], [Estado]) VALUES (3, N'Virtual', 0)
INSERT [dbo].[Cat_supervision] ([IdCatSupervision], [Nombre], [Estado]) VALUES (5, N'Virtual', 1)
INSERT [dbo].[Cat_supervision] ([IdCatSupervision], [Nombre], [Estado]) VALUES (6, N'Pensamiento', 0)
INSERT [dbo].[Cat_supervision] ([IdCatSupervision], [Nombre], [Estado]) VALUES (7, N'Proceso 1', 0)
INSERT [dbo].[Cat_supervision] ([IdCatSupervision], [Nombre], [Estado]) VALUES (8, N'Mixto', 0)
SET IDENTITY_INSERT [dbo].[Cat_supervision] OFF
GO
INSERT [dbo].[Estudiante] ([Identificacion], [Nombres], [Apellidos], [Direccion], [idGenero], [idEmpresa], [idGrupo], [rutaImagen], [Estado], [Telefono]) VALUES (N'14725836', N'Quintero', N'Roberto Federico', N'asdfasdfas', 1, NULL, N'YXrqFG9f', NULL, N'0         ', N'99998888')
INSERT [dbo].[Estudiante] ([Identificacion], [Nombres], [Apellidos], [Direccion], [idGenero], [idEmpresa], [idGrupo], [rutaImagen], [Estado], [Telefono]) VALUES (N'17906136', N'Jeison', N'Gonzales', N'La concepción Masaya', 1, 23, N'uafQ2FMm', NULL, N'0         ', N'58327168')
INSERT [dbo].[Estudiante] ([Identificacion], [Nombres], [Apellidos], [Direccion], [idGenero], [idEmpresa], [idGrupo], [rutaImagen], [Estado], [Telefono]) VALUES (N'19907335', N'Aldo', N'Vanegas', N'La paz Carazo', 1, 11, N'4iQLtzqp', NULL, N'0         ', N'57674742')
INSERT [dbo].[Estudiante] ([Identificacion], [Nombres], [Apellidos], [Direccion], [idGenero], [idEmpresa], [idGrupo], [rutaImagen], [Estado], [Telefono]) VALUES (N'19907346', N'Margarita', N'Gonzales', N'Niquininomo', 1, 22, N'vG4Be5ft', NULL, N'0         ', N'82173716')
INSERT [dbo].[Estudiante] ([Identificacion], [Nombres], [Apellidos], [Direccion], [idGenero], [idEmpresa], [idGrupo], [rutaImagen], [Estado], [Telefono]) VALUES (N'19907576', N'Alexander', N'Valverde', N'La Concepción  Masaya', 1, 11, N'4iQLtzqp', NULL, N'0         ', N'77888317')
INSERT [dbo].[Estudiante] ([Identificacion], [Nombres], [Apellidos], [Direccion], [idGenero], [idEmpresa], [idGrupo], [rutaImagen], [Estado], [Telefono]) VALUES (N'21212121', N'Moyita', N'Gonzales', N'Barrio San Antonio La Concepcion Masaya', 1, 7, NULL, NULL, N'0         ', N'98745812')
INSERT [dbo].[Estudiante] ([Identificacion], [Nombres], [Apellidos], [Direccion], [idGenero], [idEmpresa], [idGrupo], [rutaImagen], [Estado], [Telefono]) VALUES (N'25252525', N'Jose David', N'Martinez Hernandez', N'Iglesia catolica 2C al oeste 1/2 C al sur', 1, 7, NULL, NULL, N'0         ', N'98989898')
INSERT [dbo].[Estudiante] ([Identificacion], [Nombres], [Apellidos], [Direccion], [idGenero], [idEmpresa], [idGrupo], [rutaImagen], [Estado], [Telefono]) VALUES (N'25814736', N'William', N'Gonzales', N'La Concepción  Masaya', 1, NULL, NULL, NULL, N'0         ', N'12345678')
INSERT [dbo].[Estudiante] ([Identificacion], [Nombres], [Apellidos], [Direccion], [idGenero], [idEmpresa], [idGrupo], [rutaImagen], [Estado], [Telefono]) VALUES (N'25874136', N'qweqweqw', N'asdasdasd', N'sfasdfqwerqw', 1, NULL, NULL, NULL, N'0         ', N'12346578')
INSERT [dbo].[Estudiante] ([Identificacion], [Nombres], [Apellidos], [Direccion], [idGenero], [idEmpresa], [idGrupo], [rutaImagen], [Estado], [Telefono]) VALUES (N'45625874', N'William', N'Gonzales', N'La Concepción  Masaya', 1, 23, N'CXThc4vO', NULL, N'1         ', N'76222916')
INSERT [dbo].[Estudiante] ([Identificacion], [Nombres], [Apellidos], [Direccion], [idGenero], [idEmpresa], [idGrupo], [rutaImagen], [Estado], [Telefono]) VALUES (N'63214785', N'David', N'Martinez', N'La concepción Masaya', 1, 22, N'oi49z5FF', NULL, N'0         ', N'12346578')
INSERT [dbo].[Estudiante] ([Identificacion], [Nombres], [Apellidos], [Direccion], [idGenero], [idEmpresa], [idGrupo], [rutaImagen], [Estado], [Telefono]) VALUES (N'64646464', N'Freddy', N'Quintero', N'Diriamba', 1, 6, N'YXrqFG9f', N'uploads/SMPFtPlx7FbgmAI4fjzmf8F6KsFKu0KN8kCdMMBR.png', N'0         ', N'12345678')
INSERT [dbo].[Estudiante] ([Identificacion], [Nombres], [Apellidos], [Direccion], [idGenero], [idEmpresa], [idGrupo], [rutaImagen], [Estado], [Telefono]) VALUES (N'69696969', N'Urai', N'Sanchez', N'Barrio San Caralampio', 1, 6, N'YXrqFG9f', NULL, N'0         ', N'99984521')
INSERT [dbo].[Estudiante] ([Identificacion], [Nombres], [Apellidos], [Direccion], [idGenero], [idEmpresa], [idGrupo], [rutaImagen], [Estado], [Telefono]) VALUES (N'74136925', N'Melissa', N'Treminio', N'La concepción Masaya', 3, 11, N'CXThc4vO', NULL, N'1         ', N'76222916')
INSERT [dbo].[Estudiante] ([Identificacion], [Nombres], [Apellidos], [Direccion], [idGenero], [idEmpresa], [idGrupo], [rutaImagen], [Estado], [Telefono]) VALUES (N'88888888', N'asdfasdfasdf', N'asdfasdfasdf', N'aqwerqwerqwerqw', 1, NULL, NULL, NULL, N'0         ', N'4444')
INSERT [dbo].[Estudiante] ([Identificacion], [Nombres], [Apellidos], [Direccion], [idGenero], [idEmpresa], [idGrupo], [rutaImagen], [Estado], [Telefono]) VALUES (N'99999999', N'dario', N'benjamin', N'jinotepe', 1, 16, NULL, NULL, N'0         ', N'33333333')
GO
SET IDENTITY_INSERT [dbo].[EvaluacionCentro] ON 

INSERT [dbo].[EvaluacionCentro] ([idEvaluacionCentro], [IdEstudiante], [IdMaestro], [IdEmpresa], [FechaInicio], [FechaFinal], [Nota]) VALUES (3, N'64646464', N'87878787', 6, CAST(N'2024-01-31' AS Date), CAST(N'2024-03-22' AS Date), 63)
INSERT [dbo].[EvaluacionCentro] ([idEvaluacionCentro], [IdEstudiante], [IdMaestro], [IdEmpresa], [FechaInicio], [FechaFinal], [Nota]) VALUES (10, N'69696969', N'87878787', 6, CAST(N'2024-02-22' AS Date), CAST(N'2024-04-04' AS Date), 80)
INSERT [dbo].[EvaluacionCentro] ([idEvaluacionCentro], [IdEstudiante], [IdMaestro], [IdEmpresa], [FechaInicio], [FechaFinal], [Nota]) VALUES (14, N'19907335', N'98254184', 11, CAST(N'2024-02-16' AS Date), CAST(N'2024-05-21' AS Date), 80)
INSERT [dbo].[EvaluacionCentro] ([idEvaluacionCentro], [IdEstudiante], [IdMaestro], [IdEmpresa], [FechaInicio], [FechaFinal], [Nota]) VALUES (15, N'17906136', N'17902880', 23, CAST(N'2024-02-01' AS Date), CAST(N'2024-05-23' AS Date), 75)
INSERT [dbo].[EvaluacionCentro] ([idEvaluacionCentro], [IdEstudiante], [IdMaestro], [IdEmpresa], [FechaInicio], [FechaFinal], [Nota]) VALUES (16, N'74136925', N'98754123', 11, CAST(N'2024-02-25' AS Date), CAST(N'2024-04-23' AS Date), 100)
INSERT [dbo].[EvaluacionCentro] ([idEvaluacionCentro], [IdEstudiante], [IdMaestro], [IdEmpresa], [FechaInicio], [FechaFinal], [Nota]) VALUES (17, N'45625874', N'98754123', 23, CAST(N'2024-02-26' AS Date), CAST(N'2024-03-19' AS Date), 85)
SET IDENTITY_INSERT [dbo].[EvaluacionCentro] OFF
GO
SET IDENTITY_INSERT [dbo].[EvaluacionXNotas] ON 

INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (1, N'64646464', 3, 8)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (2, N'14725836', 3, 8)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (3, N'69696969', 3, 3)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (4, N'64646464', 5, 1)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (5, N'14725836', 5, 4)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (6, N'69696969', 5, 4)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (7, N'64646464', 6, 20)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (8, N'14725836', 6, 2)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (9, N'69696969', 6, 6)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (10, N'64646464', 7, 9)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (11, N'14725836', 7, 10)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (12, N'69696969', 7, 5)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (13, N'64646464', 10, 20)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (14, N'14725836', 10, 20)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (15, N'69696969', 10, 10)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (16, N'64646464', 12, 20)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (17, N'14725836', 12, 2)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (18, N'69696969', 12, 1)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (19, N'64646464', 13, 20)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (20, N'14725836', 13, 7)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (21, N'69696969', 13, 8)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (22, N'64646464', 15, 10)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (23, N'14725836', 15, 2)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (24, N'69696969', 15, 1)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (25, N'19907335', 17, 15)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (26, N'74136925', 20, 15)
INSERT [dbo].[EvaluacionXNotas] ([id], [idEstudiante], [idEvaluacion], [nota]) VALUES (27, N'45625874', 20, 0)
SET IDENTITY_INSERT [dbo].[EvaluacionXNotas] OFF
GO
SET IDENTITY_INSERT [dbo].[Evidencias_Tb] ON 

INSERT [dbo].[Evidencias_Tb] ([idEvidencia], [Nombre], [Descripcion], [idEmpresa], [Fecha], [RutaArchivo], [Estado], [NombreArchivo]) VALUES (1, N'Speaking Basico', N'Realice conforme al plan de estudio la enseñanza de speaking basico de ingles', 6, CAST(N'2024-01-11' AS Date), N'public/Archivero/ddddd.png', 1, N'ddddd.png')
INSERT [dbo].[Evidencias_Tb] ([idEvidencia], [Nombre], [Descripcion], [idEmpresa], [Fecha], [RutaArchivo], [Estado], [NombreArchivo]) VALUES (2, N'Speaking Basico', N'Realice conforme al plan de estudio la enseñanza de speaking basico de ingles', 6, CAST(N'2024-01-11' AS Date), N'public/Archivero/ddddd.png', 0, N'ddddd.png')
INSERT [dbo].[Evidencias_Tb] ([idEvidencia], [Nombre], [Descripcion], [idEmpresa], [Fecha], [RutaArchivo], [Estado], [NombreArchivo]) VALUES (3, N'sasdfasdf', N'adsfasdfasdf', 6, CAST(N'2024-01-11' AS Date), N'public/Archivero/2023_12_23_venom-if--he-was-made-by-me-22202441.png', 0, N'2023_12_23_venom-if--he-was-made-by-me-22202441.png')
INSERT [dbo].[Evidencias_Tb] ([idEvidencia], [Nombre], [Descripcion], [idEmpresa], [Fecha], [RutaArchivo], [Estado], [NombreArchivo]) VALUES (4, N'asdfasdf', N'qwerwerwerweadfasdfasdfsadf', 6, CAST(N'2024-01-12' AS Date), N'public/Archivero/REQUISITOS FUNCIONALES Y NO FUNCIONALES.docx', 0, N'REQUISITOS FUNCIONALES Y NO FUNCIONALES.docx')
INSERT [dbo].[Evidencias_Tb] ([idEvidencia], [Nombre], [Descripcion], [idEmpresa], [Fecha], [RutaArchivo], [Estado], [NombreArchivo]) VALUES (5, N'asdfasdfa', N'asdfawqerwqer', 6, CAST(N'2024-01-25' AS Date), N'public/Archivero/REQUISITOS FUNCIONALES Y NO FUNCIONALES.docx', 1, N'REQUISITOS FUNCIONALES Y NO FUNCIONALES.docx')
INSERT [dbo].[Evidencias_Tb] ([idEvidencia], [Nombre], [Descripcion], [idEmpresa], [Fecha], [RutaArchivo], [Estado], [NombreArchivo]) VALUES (6, N'ingles maestria', N'asdfasdfasdf', 10, CAST(N'2024-02-15' AS Date), N'public/Archivero/uml-tutorial-removebg-preview.png', 1, N'uml-tutorial-removebg-preview.png')
INSERT [dbo].[Evidencias_Tb] ([idEvidencia], [Nombre], [Descripcion], [idEmpresa], [Fecha], [RutaArchivo], [Estado], [NombreArchivo]) VALUES (7, N'ingles maestria', N'Iniciacion en la carrera de ingles para realizar clase', 11, CAST(N'2024-02-14' AS Date), N'public/Archivero/uml-tutorial-removebg-preview (1).png', 1, N'uml-tutorial-removebg-preview (1).png')
INSERT [dbo].[Evidencias_Tb] ([idEvidencia], [Nombre], [Descripcion], [idEmpresa], [Fecha], [RutaArchivo], [Estado], [NombreArchivo]) VALUES (8, N'evidencia 1', N'evidencia ingles', 11, CAST(N'2024-02-15' AS Date), N'public/Archivero/uml-tutorial-removebg-preview (1) (1).png', 1, N'uml-tutorial-removebg-preview (1) (1).png')
INSERT [dbo].[Evidencias_Tb] ([idEvidencia], [Nombre], [Descripcion], [idEmpresa], [Fecha], [RutaArchivo], [Estado], [NombreArchivo]) VALUES (9, N'test speaking', N'poner en practica el vocabulario', 22, CAST(N'2024-02-15' AS Date), N'public/Archivero/uml-tutorial-removebg-preview (1) (1).png', 1, N'uml-tutorial-removebg-preview (1) (1).png')
INSERT [dbo].[Evidencias_Tb] ([idEvidencia], [Nombre], [Descripcion], [idEmpresa], [Fecha], [RutaArchivo], [Estado], [NombreArchivo]) VALUES (10, N'ingles maestria', N'yyyy', 6, CAST(N'2024-02-20' AS Date), N'public/Archivero/document (2).pdf', 0, N'document (2).pdf')
INSERT [dbo].[Evidencias_Tb] ([idEvidencia], [Nombre], [Descripcion], [idEmpresa], [Fecha], [RutaArchivo], [Estado], [NombreArchivo]) VALUES (11, N'ingles maestria', N'asdf', 6, CAST(N'2024-02-20' AS Date), N'public/Archivero/document (2).pdf', 1, N'document (2).pdf')
INSERT [dbo].[Evidencias_Tb] ([idEvidencia], [Nombre], [Descripcion], [idEmpresa], [Fecha], [RutaArchivo], [Estado], [NombreArchivo]) VALUES (12, N'Manual de vocabulario', N'Manual de vocabulario basico para estudiantes de primaria', 6, CAST(N'2024-02-21' AS Date), N'public/Archivero/document (2).pdf', 1, N'document (2).pdf')
INSERT [dbo].[Evidencias_Tb] ([idEvidencia], [Nombre], [Descripcion], [idEmpresa], [Fecha], [RutaArchivo], [Estado], [NombreArchivo]) VALUES (13, N'Manual de vocabulario', N'Un pequeño manual acerca del vocabulario nuevo enseñado a los estudiantes', 6, CAST(N'2024-02-23' AS Date), N'public/Archivero/document (2).pdf', 1, N'document (2).pdf')
INSERT [dbo].[Evidencias_Tb] ([idEvidencia], [Nombre], [Descripcion], [idEmpresa], [Fecha], [RutaArchivo], [Estado], [NombreArchivo]) VALUES (14, N'ingles maestria', N'Documento entregado para la realizacion de mi plan de pedagogia del año 2024-2026', 6, CAST(N'2024-02-02' AS Date), N'public/Archivero/Manual de marca gráfica institucional UNAN-Managua.pdf', 1, N'Manual de marca gráfica institucional UNAN-Managua.pdf')
INSERT [dbo].[Evidencias_Tb] ([idEvidencia], [Nombre], [Descripcion], [idEmpresa], [Fecha], [RutaArchivo], [Estado], [NombreArchivo]) VALUES (15, N'Manual de vocabulario', N'sadfqwerwer', 6, CAST(N'2024-02-16' AS Date), N'public/Archivero/uml-tutorial-removebg-preview (1) (1).png', 1, N'uml-tutorial-removebg-preview (1) (1).png')
INSERT [dbo].[Evidencias_Tb] ([idEvidencia], [Nombre], [Descripcion], [idEmpresa], [Fecha], [RutaArchivo], [Estado], [NombreArchivo]) VALUES (16, N'asdf', N'qwerty', 6, CAST(N'2024-02-21' AS Date), N'public/Archivero/ultimo proyecto.docx', 1, N'ultimo proyecto.docx')
INSERT [dbo].[Evidencias_Tb] ([idEvidencia], [Nombre], [Descripcion], [idEmpresa], [Fecha], [RutaArchivo], [Estado], [NombreArchivo]) VALUES (17, N'Plan de estudio para el verbo to be', N'Conjugaciones para la realización del verbo to be', 11, CAST(N'2024-02-26' AS Date), N'public/Archivero/document (2) (1).pdf', 0, N'document (2) (1).pdf')
INSERT [dbo].[Evidencias_Tb] ([idEvidencia], [Nombre], [Descripcion], [idEmpresa], [Fecha], [RutaArchivo], [Estado], [NombreArchivo]) VALUES (18, N'Conjugacion del verbo to be', N'Se realizo en la primera clase la conjugacion del verbo to be para afianzar los conocimientos basicos', 23, CAST(N'2024-02-26' AS Date), N'public/Archivero/uml-tutorial-removebg-preview (1) (1) (1).png', 1, N'uml-tutorial-removebg-preview (1) (1) (1).png')
INSERT [dbo].[Evidencias_Tb] ([idEvidencia], [Nombre], [Descripcion], [idEmpresa], [Fecha], [RutaArchivo], [Estado], [NombreArchivo]) VALUES (19, N'test speaking', N'^rueba diagnostica del speaking de los estudiantes', 11, CAST(N'2024-02-26' AS Date), N'public/Archivero/uml-tutorial-removebg-preview (1) (1) (1) (1).png', 1, N'uml-tutorial-removebg-preview (1) (1) (1) (1).png')
SET IDENTITY_INSERT [dbo].[Evidencias_Tb] OFF
GO
SET IDENTITY_INSERT [dbo].[EvidenciasXEstudiante] ON 

INSERT [dbo].[EvidenciasXEstudiante] ([IdEvidenciaXEstudiante], [idEvidencia], [idEstudiante], [Estado]) VALUES (1, 13, N'64646464', 1)
INSERT [dbo].[EvidenciasXEstudiante] ([IdEvidenciaXEstudiante], [idEvidencia], [idEstudiante], [Estado]) VALUES (2, 14, N'64646464', 1)
INSERT [dbo].[EvidenciasXEstudiante] ([IdEvidenciaXEstudiante], [idEvidencia], [idEstudiante], [Estado]) VALUES (3, 15, N'64646464', 1)
INSERT [dbo].[EvidenciasXEstudiante] ([IdEvidenciaXEstudiante], [idEvidencia], [idEstudiante], [Estado]) VALUES (4, 16, N'64646464', 1)
INSERT [dbo].[EvidenciasXEstudiante] ([IdEvidenciaXEstudiante], [idEvidencia], [idEstudiante], [Estado]) VALUES (5, 17, N'74136925', 1)
INSERT [dbo].[EvidenciasXEstudiante] ([IdEvidenciaXEstudiante], [idEvidencia], [idEstudiante], [Estado]) VALUES (6, 18, N'45625874', 1)
INSERT [dbo].[EvidenciasXEstudiante] ([IdEvidenciaXEstudiante], [idEvidencia], [idEstudiante], [Estado]) VALUES (7, 19, N'74136925', 1)
SET IDENTITY_INSERT [dbo].[EvidenciasXEstudiante] OFF
GO
INSERT [dbo].[Grupos] ([Identificacion], [Nombre], [RutaImagen], [Estado]) VALUES (N'39FJ2RWA', N'sasdfsadf', NULL, 0)
INSERT [dbo].[Grupos] ([Identificacion], [Nombre], [RutaImagen], [Estado]) VALUES (N'4iQLtzqp', N'Ingles V año b', N'public/Grupos/uml-tutorial-removebg-preview.png', 1)
INSERT [dbo].[Grupos] ([Identificacion], [Nombre], [RutaImagen], [Estado]) VALUES (N'4Ksrhwnv', N'pinchle', NULL, 0)
INSERT [dbo].[Grupos] ([Identificacion], [Nombre], [RutaImagen], [Estado]) VALUES (N'boFlfXna', N'Ingles II', N'public/Grupos/uml-tutorial-removebg-preview.png', 0)
INSERT [dbo].[Grupos] ([Identificacion], [Nombre], [RutaImagen], [Estado]) VALUES (N'CXThc4vO', N'II Semestre Ingles', NULL, 1)
INSERT [dbo].[Grupos] ([Identificacion], [Nombre], [RutaImagen], [Estado]) VALUES (N'Empuvmab', N'asdfasdf', NULL, 0)
INSERT [dbo].[Grupos] ([Identificacion], [Nombre], [RutaImagen], [Estado]) VALUES (N'GvxLXrZP', N'Espartanos', N'public/Grupos/OIP.jpeg', 0)
INSERT [dbo].[Grupos] ([Identificacion], [Nombre], [RutaImagen], [Estado]) VALUES (N'iXlPL3RM', N'V año Matutino', N'public/Grupos/ddddd.png', 0)
INSERT [dbo].[Grupos] ([Identificacion], [Nombre], [RutaImagen], [Estado]) VALUES (N'K8WekbwM', N'SIMON', NULL, 1)
INSERT [dbo].[Grupos] ([Identificacion], [Nombre], [RutaImagen], [Estado]) VALUES (N'N8p1WNQM', N'fifa2023', N'public/Grupos/OIP.jpeg', 0)
INSERT [dbo].[Grupos] ([Identificacion], [Nombre], [RutaImagen], [Estado]) VALUES (N'nnaGe86h', N'SIMON', NULL, 1)
INSERT [dbo].[Grupos] ([Identificacion], [Nombre], [RutaImagen], [Estado]) VALUES (N'oi49z5FF', N'xd', N'public/Grupos/escudounan.png', 0)
INSERT [dbo].[Grupos] ([Identificacion], [Nombre], [RutaImagen], [Estado]) VALUES (N'TNk9j1pv', N'jjk', N'public/Grupos/OIP.jpeg', 0)
INSERT [dbo].[Grupos] ([Identificacion], [Nombre], [RutaImagen], [Estado]) VALUES (N'uafQ2FMm', N'Ingles V 2', NULL, 1)
INSERT [dbo].[Grupos] ([Identificacion], [Nombre], [RutaImagen], [Estado]) VALUES (N'vG4Be5ft', N'Ingles V3', NULL, 1)
INSERT [dbo].[Grupos] ([Identificacion], [Nombre], [RutaImagen], [Estado]) VALUES (N'xPGniZRZ', N'V año ingles 2024', NULL, 1)
INSERT [dbo].[Grupos] ([Identificacion], [Nombre], [RutaImagen], [Estado]) VALUES (N'YXrqFG9f', N'Grupo de ingles I Semestre 2024', N'public/Grupos/ddddd.png', 1)
GO
INSERT [dbo].[GrupoTb] ([IdGrupo], [Nombre], [Estado], [RutaImagen]) VALUES (N'asdfqwer', N'ffffffff', 1, NULL)
INSERT [dbo].[GrupoTb] ([IdGrupo], [Nombre], [Estado], [RutaImagen]) VALUES (N'jEa4G004', N'V año ingles', 1, N'public/Grupos/ddddd.png')
INSERT [dbo].[GrupoTb] ([IdGrupo], [Nombre], [Estado], [RutaImagen]) VALUES (N'oZSbrdiG', N'sdfasdf', 1, N'public/Grupos/ddddd.png')
GO
SET IDENTITY_INSERT [dbo].[GrupoXMaestro] ON 

INSERT [dbo].[GrupoXMaestro] ([IdGrupo], [IdMaestro], [Estado], [IdgrupoMaestro]) VALUES (N'YXrqFG9f', N'87878787', 1, 14)
INSERT [dbo].[GrupoXMaestro] ([IdGrupo], [IdMaestro], [Estado], [IdgrupoMaestro]) VALUES (N'iXlPL3RM', N'87878787', 0, 15)
INSERT [dbo].[GrupoXMaestro] ([IdGrupo], [IdMaestro], [Estado], [IdgrupoMaestro]) VALUES (N'GvxLXrZP', N'98989898', 0, 16)
INSERT [dbo].[GrupoXMaestro] ([IdGrupo], [IdMaestro], [Estado], [IdgrupoMaestro]) VALUES (N'oi49z5FF', N'87878787', 0, 17)
INSERT [dbo].[GrupoXMaestro] ([IdGrupo], [IdMaestro], [Estado], [IdgrupoMaestro]) VALUES (N'39FJ2RWA', N'87878787', 0, 18)
INSERT [dbo].[GrupoXMaestro] ([IdGrupo], [IdMaestro], [Estado], [IdgrupoMaestro]) VALUES (N'Empuvmab', N'87878787', 0, 19)
INSERT [dbo].[GrupoXMaestro] ([IdGrupo], [IdMaestro], [Estado], [IdgrupoMaestro]) VALUES (N'4Ksrhwnv', N'87878787', 0, 20)
INSERT [dbo].[GrupoXMaestro] ([IdGrupo], [IdMaestro], [Estado], [IdgrupoMaestro]) VALUES (N'N8p1WNQM', N'87878787', 0, 21)
INSERT [dbo].[GrupoXMaestro] ([IdGrupo], [IdMaestro], [Estado], [IdgrupoMaestro]) VALUES (N'TNk9j1pv', N'87878787', 0, 22)
INSERT [dbo].[GrupoXMaestro] ([IdGrupo], [IdMaestro], [Estado], [IdgrupoMaestro]) VALUES (N'nnaGe86h', N'25252525', 1, 23)
INSERT [dbo].[GrupoXMaestro] ([IdGrupo], [IdMaestro], [Estado], [IdgrupoMaestro]) VALUES (N'K8WekbwM', N'98989898', 1, 24)
INSERT [dbo].[GrupoXMaestro] ([IdGrupo], [IdMaestro], [Estado], [IdgrupoMaestro]) VALUES (N'4iQLtzqp', N'98254184', 1, 25)
INSERT [dbo].[GrupoXMaestro] ([IdGrupo], [IdMaestro], [Estado], [IdgrupoMaestro]) VALUES (N'xPGniZRZ', N'98254184', 1, 26)
INSERT [dbo].[GrupoXMaestro] ([IdGrupo], [IdMaestro], [Estado], [IdgrupoMaestro]) VALUES (N'uafQ2FMm', N'17902880', 1, 27)
INSERT [dbo].[GrupoXMaestro] ([IdGrupo], [IdMaestro], [Estado], [IdgrupoMaestro]) VALUES (N'vG4Be5ft', N'17902880', 1, 28)
INSERT [dbo].[GrupoXMaestro] ([IdGrupo], [IdMaestro], [Estado], [IdgrupoMaestro]) VALUES (N'boFlfXna', N'98754123', 0, 29)
INSERT [dbo].[GrupoXMaestro] ([IdGrupo], [IdMaestro], [Estado], [IdgrupoMaestro]) VALUES (N'CXThc4vO', N'98754123', 1, 30)
SET IDENTITY_INSERT [dbo].[GrupoXMaestro] OFF
GO
INSERT [dbo].[Maestro] ([Identificacion], [especialidad], [idGenero], [FotoRuta], [Estado], [Nombres], [Apellidos]) VALUES (N'12345687', N'gramatica', 3, NULL, 1, N'cristina', N'lopez')
INSERT [dbo].[Maestro] ([Identificacion], [especialidad], [idGenero], [FotoRuta], [Estado], [Nombres], [Apellidos]) VALUES (N'12478523', N'Maestra de lenguas extranjeras', 3, NULL, 0, N'Alexa', N'Sanchez Far')
INSERT [dbo].[Maestro] ([Identificacion], [especialidad], [idGenero], [FotoRuta], [Estado], [Nombres], [Apellidos]) VALUES (N'17902880', N'Maestro de ingles', 1, NULL, 0, N'Freddy', N'Romero')
INSERT [dbo].[Maestro] ([Identificacion], [especialidad], [idGenero], [FotoRuta], [Estado], [Nombres], [Apellidos]) VALUES (N'19900781', N'Administrador de base de datos', 1, NULL, 1, N'Alexander', N'Martinez')
INSERT [dbo].[Maestro] ([Identificacion], [especialidad], [idGenero], [FotoRuta], [Estado], [Nombres], [Apellidos]) VALUES (N'22222222', N'Lic.Lenguas Extranjeras', 1, NULL, 0, N'Patroclio', N'Hernandez')
INSERT [dbo].[Maestro] ([Identificacion], [especialidad], [idGenero], [FotoRuta], [Estado], [Nombres], [Apellidos]) VALUES (N'25252525', N'Master en Lenguas Extranjeras', 1, NULL, 0, N'Fabian', N'Espinozaaaa')
INSERT [dbo].[Maestro] ([Identificacion], [especialidad], [idGenero], [FotoRuta], [Estado], [Nombres], [Apellidos]) VALUES (N'44444444', N'Master en lenguas Extranjeras ff', 3, NULL, 0, N'Fernando Rojas ff', N'Rosales ff')
INSERT [dbo].[Maestro] ([Identificacion], [especialidad], [idGenero], [FotoRuta], [Estado], [Nombres], [Apellidos]) VALUES (N'65419519', N'Administradora de base de datos', 1, NULL, 0, N'Cristina', N'Guevara')
INSERT [dbo].[Maestro] ([Identificacion], [especialidad], [idGenero], [FotoRuta], [Estado], [Nombres], [Apellidos]) VALUES (N'87878787', N'Maestro de ingles', 1, N'uploads/CLyVYq0z2aG5gqhmQ6oLuB2TsI5h7aOkGlS5MMM1.png', 0, N'Urai David', N'Lopez')
INSERT [dbo].[Maestro] ([Identificacion], [especialidad], [idGenero], [FotoRuta], [Estado], [Nombres], [Apellidos]) VALUES (N'90171718', N'Desarrolladora web', 1, NULL, 0, N'Deysi', N'Calderon')
INSERT [dbo].[Maestro] ([Identificacion], [especialidad], [idGenero], [FotoRuta], [Estado], [Nombres], [Apellidos]) VALUES (N'98254184', N'Lic en lenguajes extranjeras', 3, NULL, 0, N'Cristopher', N'Garcia')
INSERT [dbo].[Maestro] ([Identificacion], [especialidad], [idGenero], [FotoRuta], [Estado], [Nombres], [Apellidos]) VALUES (N'98754123', N'Master en Lenguas Extranjeras', 1, NULL, 1, N'Fabian', N'Espinoza')
INSERT [dbo].[Maestro] ([Identificacion], [especialidad], [idGenero], [FotoRuta], [Estado], [Nombres], [Apellidos]) VALUES (N'98989898', N'Maestro de lenguas extranjeras', 1, NULL, 0, N'Moises David', N'Aguirre')
GO
SET IDENTITY_INSERT [dbo].[migrations] ON 

INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (1, N'2019_12_14_000001_create_personal_access_tokens_table', 1)
SET IDENTITY_INSERT [dbo].[migrations] OFF
GO
SET IDENTITY_INSERT [dbo].[Permisos] ON 

INSERT [dbo].[Permisos] ([Id], [NombrePermiso], [Ruta], [Icono], [Titulo], [page]) VALUES (1, N'Vista Agregar Maestro', N'Administrador.Ver.Maestro', N'fas fa-fw fa-users', N'Agregar usuario', NULL)
INSERT [dbo].[Permisos] ([Id], [NombrePermiso], [Ruta], [Icono], [Titulo], [page]) VALUES (2, N'Vista Agregar Estudiante', N'Administrador.Ver.Estudiante', N'fas fa-fw fa-users', N'Agregar estudiante', NULL)
INSERT [dbo].[Permisos] ([Id], [NombrePermiso], [Ruta], [Icono], [Titulo], [page]) VALUES (3, N'Vista Unidad', N'Administrador.Ver.Unidad', N'fas fa-fw fa-book-open', N'Unidades', NULL)
INSERT [dbo].[Permisos] ([Id], [NombrePermiso], [Ruta], [Icono], [Titulo], [page]) VALUES (4, N'Vista Categorías evaluación', N'Administrador.Ver.CategoriaEvaluacion', N'fas fa-fw fa-clipboard', N'Categorías evaluación', NULL)
INSERT [dbo].[Permisos] ([Id], [NombrePermiso], [Ruta], [Icono], [Titulo], [page]) VALUES (5, N'Vista Categorías supervisión', N'Administrador.Ver.CategoriaSupervision', N'fas fa-fw fa-list', N'Categorías de supervisión', NULL)
INSERT [dbo].[Permisos] ([Id], [NombrePermiso], [Ruta], [Icono], [Titulo], [page]) VALUES (6, N'Vista Centro de prácticas', N'Administrador.Ver.CentroPractica', N'fas fa-fw fa-building', N'Centro de prácticas', NULL)
INSERT [dbo].[Permisos] ([Id], [NombrePermiso], [Ruta], [Icono], [Titulo], [page]) VALUES (7, N'Vista Género', N'Administrador.Ver.Genero', N'fas fa-fw fa-venus-mars', N'Género', NULL)
INSERT [dbo].[Permisos] ([Id], [NombrePermiso], [Ruta], [Icono], [Titulo], [page]) VALUES (8, N'Vista Rol', N'Administrador.Ver.Rol', N'fas fa-fw fa-user', N'Rol', NULL)
INSERT [dbo].[Permisos] ([Id], [NombrePermiso], [Ruta], [Icono], [Titulo], [page]) VALUES (9, N'Vista Grupos', N'Maestro.Ver.Grupo', N'fas fa-fw fa-user', N'Grupos', NULL)
INSERT [dbo].[Permisos] ([Id], [NombrePermiso], [Ruta], [Icono], [Titulo], [page]) VALUES (10, N'Vista Evidencias', N'Maestro.Ver.Evidencia', N'fas fa-fw fa-clipboard', N'Evidencias', NULL)
INSERT [dbo].[Permisos] ([Id], [NombrePermiso], [Ruta], [Icono], [Titulo], [page]) VALUES (11, N'Vista Evaluaciones Asignadas', N'Maestro.Ver.Asignadas', N'fa-solid fa-list', N'Evaluaciones asignadas', NULL)
INSERT [dbo].[Permisos] ([Id], [NombrePermiso], [Ruta], [Icono], [Titulo], [page]) VALUES (12, N'Vista Evaluaciones Completadas', N'Maestro.Ver.Completadas', N'fa-solid fa-check-to-slot', N'Evaluaciones completadas', NULL)
INSERT [dbo].[Permisos] ([Id], [NombrePermiso], [Ruta], [Icono], [Titulo], [page]) VALUES (13, N'Vista Supervisión', N'Maestro.Ver.Supervision', N'fas fa-fw fa-building', N'Supervisión', NULL)
INSERT [dbo].[Permisos] ([Id], [NombrePermiso], [Ruta], [Icono], [Titulo], [page]) VALUES (44, N'Vista evaluacion estudiante', N'Estudiante.Ver', N'fa-solid fa-folder', N'Evaluaciones', NULL)
INSERT [dbo].[Permisos] ([Id], [NombrePermiso], [Ruta], [Icono], [Titulo], [page]) VALUES (45, N'Vista supervision estudiante', N'Estudiante.Supervision', N'fas fa-fw fa-clipboard', N'Supervisión', NULL)
INSERT [dbo].[Permisos] ([Id], [NombrePermiso], [Ruta], [Icono], [Titulo], [page]) VALUES (46, N'Vista evidencia estudiante', N'Estudiante.Listado.Actividades', N'fas fa-fw fa-building', N'Evidencias', NULL)
INSERT [dbo].[Permisos] ([Id], [NombrePermiso], [Ruta], [Icono], [Titulo], [page]) VALUES (47, N'Vista Reportes', N'Maestro.Ver.GrupoReporte', N'fa-solid fa-chart-simple', N'Reporte alumnos', NULL)
SET IDENTITY_INSERT [dbo].[Permisos] OFF
GO
SET IDENTITY_INSERT [dbo].[Procesos] ON 

INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (1, N'Guardar Maestro', N'SaveTeacher')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (2, N'Eliminar Maestro', N'teacher.destroy')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (3, N'Guardar Estudiante', N'SaveStudent')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (4, N'Eliminar Estudiante', N'student.destroy')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (5, N'Guardar Centro de practica', N'SaveCompany')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (6, N'Eliminar Centro de practica', N'empresa.destroy')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (7, N'Guardar unidad', N'Adminstrador.Guardar.Unidad')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (8, N'Eliminar unidad', N'unidad.destroy')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (9, N'Guardar Categoria Evaluacion', N'Administrador.Guardar.CategoriaEvaluacion')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (10, N'Eliminar Categoria Evaluacion', N'catevaluacion.destroy')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (11, N'Guardar Categoria Supervision', N'Administrador.Guardar.CategoriaSupervision')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (12, N'Eliminar Categoria Supervision', N'supervision.destroy')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (13, N'Guardar Genero', N'SaveGenero')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (14, N'Eliminar Genero', N'genero.destroy')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (15, N'Guardar Rol', N'SaveRol')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (16, N'Eliminar Rol', N'rol.destroy')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (17, N'Listado Alumnos', N'AlumnoListado')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (18, N'Guardar Grupo', N'GrupoSave')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (19, N'Eliminar Grupo', N'Grupodelete')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (20, N'Listar Asignacion', N'Maestro.Listar.Asignacion')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (21, N'Guardar Asignacion', N'AsignacionSave')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (22, N'Eliminar Asignacion', N'destroy.asignacion')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (23, N'Listar Corregidas', N'Maestro.Listar.Corregidas')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (24, N'Guardar Corregidas', N'CorreccionSave')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (25, N'Listado Supervision', N'Maestro.Ver.SupervisionListado')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (26, N'Listado Supervision individual', N'ViewSupervision')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (27, N'Guardar Supervision', N'SaveSupervision')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (28, N'Eliminar Supervision', N'SupervisionDestroy')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (29, N'Listado Evidencia', N'Maestro.Listado.Evidencia')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (30, N'Evidencia Individual', N'ViewEvidencia')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (34, N'Comprobar datos estudiante', N'Estudiante.corroborar')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (35, N'Eliminar evidencia', N'Estudiante.EvidenciaDestroy')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (36, N'Guardar evidencia', N'Estudiante.EvidenciaSave')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (37, N'Ver Reporte', N'Maestro.Ver.ReportePdf')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (38, N'Guardar Reporte', N'Maestro.Guardar.ReportePdf')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (39, N'Guardar Valoracion centro de practicas', N'Maestro.Guardar.NotaCentro')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (40, N'Guardar Permisos', N'Administrador.permisos.guardar')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (41, N'Ver listado de alumnos para reporte', N'Maestro.Ver.ReporteListado')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (42, N'Guardar Actividad Estudiante', N'Estudiante.Guardar.Actividad')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (43, N'Eliminar Actividad Estudiante', N'Estudiante.destroy.Actividad')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (44, N'Listar Evidencia', N'Estudiante.Evidencia1')
INSERT [dbo].[Procesos] ([IdProceso], [NombreProceso], [Ruta]) VALUES (45, N'Listar Actividades Maestro', N'Maestro.Listado.Actividades')
SET IDENTITY_INSERT [dbo].[Procesos] OFF
GO
SET IDENTITY_INSERT [dbo].[ProcesoXPermiso] ON 

INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (1, 1, 1)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (2, 2, 1)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (3, 3, 2)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (4, 4, 2)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (5, 7, 3)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (6, 8, 3)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (7, 9, 4)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (8, 10, 4)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (9, 11, 5)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (10, 12, 5)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (11, 5, 6)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (12, 6, 6)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (13, 13, 7)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (14, 14, 7)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (15, 15, 8)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (16, 16, 8)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (17, 17, 9)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (18, 18, 9)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (19, 19, 9)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (20, 29, 10)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (21, 30, 10)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (22, 20, 11)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (23, 21, 11)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (24, 22, 11)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (25, 23, 12)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (26, 24, 12)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (27, 25, 13)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (28, 26, 13)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (29, 27, 13)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (30, 28, 13)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (33, 34, 44)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (34, 34, 45)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (35, 34, 46)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (36, 35, 46)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (37, 36, 46)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (38, 41, 47)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (39, 37, 47)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (40, 38, 47)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (41, 39, 12)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (42, 40, 8)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (43, 42, 46)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (44, 43, 46)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (45, 44, 46)
INSERT [dbo].[ProcesoXPermiso] ([IdProcesoXPermiso], [Proceso_Id], [Permiso_Id]) VALUES (46, 45, 10)
SET IDENTITY_INSERT [dbo].[ProcesoXPermiso] OFF
GO
SET IDENTITY_INSERT [dbo].[ReportesTb] ON 

INSERT [dbo].[ReportesTb] ([IdReporte], [IdAlumno], [IdMaestro], [HoraEntrada], [HoraSalida], [Observacion], [Area], [RolAsignado], [HorasPracticas], [Departamento], [Coordinador]) VALUES (1, N'64646464', N'87878787', N'7:00am', N'1:00pm', N'Puede llegar a obtener mas potencial', N'Aulas de clases primaria', N'Docente de ingles', N'240', N'DEPARTAMENTO DE CIENCIAS DE LA EDUCACIÓN', N'Kenya Ortiz')
INSERT [dbo].[ReportesTb] ([IdReporte], [IdAlumno], [IdMaestro], [HoraEntrada], [HoraSalida], [Observacion], [Area], [RolAsignado], [HorasPracticas], [Departamento], [Coordinador]) VALUES (7, N'74136925', N'98754123', N'6:00am', N'8:00am', N'La estudiante tomo en cuenta todos los conocimientos de la carrera de ingles y los concreto de manera esplendida con los estudiantes del centro de practicas tiene potencial para seguir aprendiendo mas y realizar un mejor trabajo', N'Aulas de clases primaria', N'Docente de ingles', N'220', N'DEPARTAMENTO DE CIENCIAS DE LA EDUCACIÓN', N'Kenya Ortiz')
SET IDENTITY_INSERT [dbo].[ReportesTb] OFF
GO
SET IDENTITY_INSERT [dbo].[Roles] ON 

INSERT [dbo].[Roles] ([IdRol], [Nombre], [Estado]) VALUES (1, N'Administrador', 1)
INSERT [dbo].[Roles] ([IdRol], [Nombre], [Estado]) VALUES (26, N'Maestro', 1)
INSERT [dbo].[Roles] ([IdRol], [Nombre], [Estado]) VALUES (28, N'Coordinador', 0)
INSERT [dbo].[Roles] ([IdRol], [Nombre], [Estado]) VALUES (29, N'Estudiante', 1)
INSERT [dbo].[Roles] ([IdRol], [Nombre], [Estado]) VALUES (30, N'Alumno', 0)
INSERT [dbo].[Roles] ([IdRol], [Nombre], [Estado]) VALUES (31, N'Coordinador2', 0)
INSERT [dbo].[Roles] ([IdRol], [Nombre], [Estado]) VALUES (32, N'Coordinador 23', 0)
INSERT [dbo].[Roles] ([IdRol], [Nombre], [Estado]) VALUES (33, N'Coordinador', 0)
INSERT [dbo].[Roles] ([IdRol], [Nombre], [Estado]) VALUES (34, N'3wc', 0)
INSERT [dbo].[Roles] ([IdRol], [Nombre], [Estado]) VALUES (35, N'Perrin', 0)
INSERT [dbo].[Roles] ([IdRol], [Nombre], [Estado]) VALUES (36, N'Secretario', 0)
INSERT [dbo].[Roles] ([IdRol], [Nombre], [Estado]) VALUES (37, N'Rector Academico', 0)
SET IDENTITY_INSERT [dbo].[Roles] OFF
GO
SET IDENTITY_INSERT [dbo].[RolesXPermisos] ON 

INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (1, 1, 1)
INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (2, 2, 1)
INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (4, 4, 1)
INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (5, 5, 1)
INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (6, 6, 1)
INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (59, 7, 1)
INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (60, 8, 1)
INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (74, 11, 26)
INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (75, 12, 26)
INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (76, 10, 26)
INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (77, 9, 26)
INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (78, 13, 26)
INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (79, 44, 29)
INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (80, 45, 29)
INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (81, 46, 29)
INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (1083, 3, 28)
INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (1084, 47, 26)
INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (1085, 2, 37)
INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (1086, 10, 37)
INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (1087, 9, 37)
INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (1088, 47, 37)
INSERT [dbo].[RolesXPermisos] ([idRolesXPermisos], [Permisos_Id], [Roles_id]) VALUES (1089, 3, 1)
SET IDENTITY_INSERT [dbo].[RolesXPermisos] OFF
GO
SET IDENTITY_INSERT [dbo].[Supervision_Tb] ON 

INSERT [dbo].[Supervision_Tb] ([idSupervision], [idEstudiante], [idDocente], [idEmpresa], [FechaSupervision], [Observacion], [Estado], [IdTipoSupervision]) VALUES (1, N'64646464', N'87878787', 6, CAST(N'2024-01-09T00:00:00.000' AS DateTime), N'Se realizaron algunos procedimientos de manera que pueden mejorarse he de decir que fue lo mas correcto.', 0, 1)
INSERT [dbo].[Supervision_Tb] ([idSupervision], [idEstudiante], [idDocente], [idEmpresa], [FechaSupervision], [Observacion], [Estado], [IdTipoSupervision]) VALUES (2, N'64646464', N'87878787', 6, CAST(N'2024-01-12T00:00:00.000' AS DateTime), N'Se reconoce los conocimientos del estudiante con un poco mas de practica podra realizar y efectuar las acciones de la manera mas efectiva posible', 1, 1)
INSERT [dbo].[Supervision_Tb] ([idSupervision], [idEstudiante], [idDocente], [idEmpresa], [FechaSupervision], [Observacion], [Estado], [IdTipoSupervision]) VALUES (3, N'69696969', N'87878787', 6, CAST(N'2024-01-11T00:00:00.000' AS DateTime), N'wqerwerwqer', 1, 1)
INSERT [dbo].[Supervision_Tb] ([idSupervision], [idEstudiante], [idDocente], [idEmpresa], [FechaSupervision], [Observacion], [Estado], [IdTipoSupervision]) VALUES (4, N'19907335', N'98254184', 11, CAST(N'2024-02-14T00:00:00.000' AS DateTime), N'apreciacion de las tecnicas de estudio', 1, 5)
INSERT [dbo].[Supervision_Tb] ([idSupervision], [idEstudiante], [idDocente], [idEmpresa], [FechaSupervision], [Observacion], [Estado], [IdTipoSupervision]) VALUES (5, N'17906136', N'17902880', 23, CAST(N'2024-02-15T00:00:00.000' AS DateTime), N'fue destacable', 1, 5)
INSERT [dbo].[Supervision_Tb] ([idSupervision], [idEstudiante], [idDocente], [idEmpresa], [FechaSupervision], [Observacion], [Estado], [IdTipoSupervision]) VALUES (6, N'74136925', N'98754123', 11, CAST(N'2024-02-22T00:00:00.000' AS DateTime), N'Se realizo de manera coherente los procedimientos para la realización de una clase de ingles con la creación de un plan para los estudiantes de 3 grado', 0, 1)
INSERT [dbo].[Supervision_Tb] ([idSupervision], [idEstudiante], [idDocente], [idEmpresa], [FechaSupervision], [Observacion], [Estado], [IdTipoSupervision]) VALUES (7, N'74136925', N'98754123', 11, CAST(N'2024-02-23T00:00:00.000' AS DateTime), N'Se realizo de manera coherente los procedimientos para la realización de una clase de ingles con la creación de un plan para los estudiantes de 3 grado
Estado Activo', 1, 1)
SET IDENTITY_INSERT [dbo].[Supervision_Tb] OFF
GO
SET IDENTITY_INSERT [dbo].[Tb_empresa] ON 

INSERT [dbo].[Tb_empresa] ([IdEmpresa], [Nombre], [Descripcion], [Responsable], [Estado], [TelResponsable]) VALUES (6, N'Call Center', N'Centro de llamadas para ofrecer servicios internacionales', N'Mario Lopez', 0, N'76222916')
INSERT [dbo].[Tb_empresa] ([IdEmpresa], [Nombre], [Descripcion], [Responsable], [Estado], [TelResponsable]) VALUES (7, N'Contollo', N'Empresa que se encarga en la creacion de software y soporte tecnico de computadoras, laptops como tambien de ensamblaje y venta', N'Daniel', 1, N'76222916')
INSERT [dbo].[Tb_empresa] ([IdEmpresa], [Nombre], [Descripcion], [Responsable], [Estado], [TelResponsable]) VALUES (8, N'Instituto Guillermo Ampie Lanzas', N'Instituto que imparte educación primaria y secundaria', N'Moises Aguirre', 0, NULL)
INSERT [dbo].[Tb_empresa] ([IdEmpresa], [Nombre], [Descripcion], [Responsable], [Estado], [TelResponsable]) VALUES (10, N'Colegio Monserrath', N'Dedicada a la educacion de estudiantes de primaria y secundaria.', N'Maria Reyes', 1, NULL)
INSERT [dbo].[Tb_empresa] ([IdEmpresa], [Nombre], [Descripcion], [Responsable], [Estado], [TelResponsable]) VALUES (11, N'Colegio Emilio Gonzales', N'asñldfjasdlkfjaskdfjlaks', N'Perseo Gonzales', 1, N'78549459')
INSERT [dbo].[Tb_empresa] ([IdEmpresa], [Nombre], [Descripcion], [Responsable], [Estado], [TelResponsable]) VALUES (12, N'Colegio Juan XXIII', N'Escuela dedicada a la educacion primaria y secundaria', N'Federico Gonzales', 1, N'76222916')
INSERT [dbo].[Tb_empresa] ([IdEmpresa], [Nombre], [Descripcion], [Responsable], [Estado], [TelResponsable]) VALUES (13, N'asdfasdfffff', N'fffqwerwerw', N'fgargwegwaeg', 0, NULL)
INSERT [dbo].[Tb_empresa] ([IdEmpresa], [Nombre], [Descripcion], [Responsable], [Estado], [TelResponsable]) VALUES (14, N'pipipip', N'popopopopop', N'dfqwerqwerasdf', 0, NULL)
INSERT [dbo].[Tb_empresa] ([IdEmpresa], [Nombre], [Descripcion], [Responsable], [Estado], [TelResponsable]) VALUES (15, N'totototot', N'ppppppppp', N'Steve Sandler', 0, NULL)
INSERT [dbo].[Tb_empresa] ([IdEmpresa], [Nombre], [Descripcion], [Responsable], [Estado], [TelResponsable]) VALUES (16, N'unan', N'universidad', N'dario', 0, NULL)
INSERT [dbo].[Tb_empresa] ([IdEmpresa], [Nombre], [Descripcion], [Responsable], [Estado], [TelResponsable]) VALUES (17, N'Centro de estudio Mariposas', N'Es una institucion dedicada al idioma ingles en la disposicion de personas con la habilidad de hablar ingles para asignarlos como interpretes', N'Pepe Aguilar', 0, N'77777777')
INSERT [dbo].[Tb_empresa] ([IdEmpresa], [Nombre], [Descripcion], [Responsable], [Estado], [TelResponsable]) VALUES (18, N'asdfa', N'asdfasd', N'asdsad', 0, N'444')
INSERT [dbo].[Tb_empresa] ([IdEmpresa], [Nombre], [Descripcion], [Responsable], [Estado], [TelResponsable]) VALUES (19, N'asdfasdf', N'asdfasdf', N'asdfasdf', 0, NULL)
INSERT [dbo].[Tb_empresa] ([IdEmpresa], [Nombre], [Descripcion], [Responsable], [Estado], [TelResponsable]) VALUES (20, N'sdfsdfsadfasdfas', N'asdfasdfasdf', N'qwerqwerqw', 0, NULL)
INSERT [dbo].[Tb_empresa] ([IdEmpresa], [Nombre], [Descripcion], [Responsable], [Estado], [TelResponsable]) VALUES (21, N'sdfasweweewrwrw', N'wrwrqwrqwrqwrqwrqw', N'qwrqwrqwrqwrqwr', 0, NULL)
INSERT [dbo].[Tb_empresa] ([IdEmpresa], [Nombre], [Descripcion], [Responsable], [Estado], [TelResponsable]) VALUES (22, N'Escuela San Caralampio', N'Escuela que forma a niños de primaria y secundaria', N'Margarita Flores', 0, N'12346578')
INSERT [dbo].[Tb_empresa] ([IdEmpresa], [Nombre], [Descripcion], [Responsable], [Estado], [TelResponsable]) VALUES (23, N'Escuela Mariposas', N'Escuela de enseñanza de ingles', N'Pedro Chavarria', 1, N'76222916')
INSERT [dbo].[Tb_empresa] ([IdEmpresa], [Nombre], [Descripcion], [Responsable], [Estado], [TelResponsable]) VALUES (24, N'Concentrix', N'Call center que ofrece servicios varios a clientes internacionales', N'Flores Margarita', 1, N'76222916')
SET IDENTITY_INSERT [dbo].[Tb_empresa] OFF
GO
SET IDENTITY_INSERT [dbo].[Tb_Evaluaciones] ON 

INSERT [dbo].[Tb_Evaluaciones] ([IdEvaluacion], [Nombre], [Descripcion], [IdUnidad], [IdTipo], [IdGrupo], [FechaCreacion], [Estado], [Puntaje]) VALUES (1, N'Fast', N'popopopo', 1, 1, N'YXrqFG9f', CAST(N'2024-01-04T00:00:00.000' AS DateTime), 0, 20)
INSERT [dbo].[Tb_Evaluaciones] ([IdEvaluacion], [Nombre], [Descripcion], [IdUnidad], [IdTipo], [IdGrupo], [FechaCreacion], [Estado], [Puntaje]) VALUES (2, N'Fast Speaking', N'speaking rapido acerca del vocabulario realizado', 5, 2, N'YXrqFG9f', CAST(N'2024-01-04T00:00:00.000' AS DateTime), 0, 20)
INSERT [dbo].[Tb_Evaluaciones] ([IdEvaluacion], [Nombre], [Descripcion], [IdUnidad], [IdTipo], [IdGrupo], [FechaCreacion], [Estado], [Puntaje]) VALUES (3, N'Speaking Basico', N'asdfasdfasd', 1, 2, N'YXrqFG9f', CAST(N'2024-01-10T00:00:00.000' AS DateTime), 0, 15)
INSERT [dbo].[Tb_Evaluaciones] ([IdEvaluacion], [Nombre], [Descripcion], [IdUnidad], [IdTipo], [IdGrupo], [FechaCreacion], [Estado], [Puntaje]) VALUES (4, N'dfasdfasdf', N'asdfasdf', 1, 2, N'YXrqFG9f', CAST(N'2024-01-16T00:00:00.000' AS DateTime), 0, NULL)
INSERT [dbo].[Tb_Evaluaciones] ([IdEvaluacion], [Nombre], [Descripcion], [IdUnidad], [IdTipo], [IdGrupo], [FechaCreacion], [Estado], [Puntaje]) VALUES (5, N'asdfsdfqwer', N'asdfasdfasdfasdfasdf', 1, 2, N'YXrqFG9f', CAST(N'2024-01-17T00:00:00.000' AS DateTime), 0, 20)
INSERT [dbo].[Tb_Evaluaciones] ([IdEvaluacion], [Nombre], [Descripcion], [IdUnidad], [IdTipo], [IdGrupo], [FechaCreacion], [Estado], [Puntaje]) VALUES (6, N'qwerwerwe', N'qwerqwerqwer', 1, 1, N'YXrqFG9f', CAST(N'2024-01-18T00:00:00.000' AS DateTime), 1, 20)
INSERT [dbo].[Tb_Evaluaciones] ([IdEvaluacion], [Nombre], [Descripcion], [IdUnidad], [IdTipo], [IdGrupo], [FechaCreacion], [Estado], [Puntaje]) VALUES (7, N'Listening', N'practicas de listening correctas', 1, 2, N'YXrqFG9f', CAST(N'2024-01-18T00:00:00.000' AS DateTime), 0, 20)
INSERT [dbo].[Tb_Evaluaciones] ([IdEvaluacion], [Nombre], [Descripcion], [IdUnidad], [IdTipo], [IdGrupo], [FechaCreacion], [Estado], [Puntaje]) VALUES (8, N'Speaking avanzado', N'Es una practica de vocabulario avanzado para entrar a los centros de practicas', 7, 2, N'K8WekbwM', CAST(N'2024-02-01T00:00:00.000' AS DateTime), 1, 10)
INSERT [dbo].[Tb_Evaluaciones] ([IdEvaluacion], [Nombre], [Descripcion], [IdUnidad], [IdTipo], [IdGrupo], [FechaCreacion], [Estado], [Puntaje]) VALUES (9, N'Speaking Basico', N'asdfasdfasdfasdf', 7, 2, N'YXrqFG9f', CAST(N'2024-02-01T00:00:00.000' AS DateTime), 0, 20)
INSERT [dbo].[Tb_Evaluaciones] ([IdEvaluacion], [Nombre], [Descripcion], [IdUnidad], [IdTipo], [IdGrupo], [FechaCreacion], [Estado], [Puntaje]) VALUES (10, N'Speaking Basico', N'asdfasdfqwerwqer', 7, 2, N'YXrqFG9f', CAST(N'2024-02-01T00:00:00.000' AS DateTime), 1, 20)
INSERT [dbo].[Tb_Evaluaciones] ([IdEvaluacion], [Nombre], [Descripcion], [IdUnidad], [IdTipo], [IdGrupo], [FechaCreacion], [Estado], [Puntaje]) VALUES (11, N'Speaking Basico', N'asdfasdfasdf', 7, 5, N'YXrqFG9f', CAST(N'2024-02-01T00:00:00.000' AS DateTime), 0, 20)
INSERT [dbo].[Tb_Evaluaciones] ([IdEvaluacion], [Nombre], [Descripcion], [IdUnidad], [IdTipo], [IdGrupo], [FechaCreacion], [Estado], [Puntaje]) VALUES (12, N'Speaking Basico', N'dtwertwerwqer', 7, 2, N'YXrqFG9f', CAST(N'2024-02-01T00:00:00.000' AS DateTime), 1, 20)
INSERT [dbo].[Tb_Evaluaciones] ([IdEvaluacion], [Nombre], [Descripcion], [IdUnidad], [IdTipo], [IdGrupo], [FechaCreacion], [Estado], [Puntaje]) VALUES (13, N'erfqwerqwer', N'fasdfsdfsdfasdf', 7, 5, N'YXrqFG9f', CAST(N'2024-02-01T00:00:00.000' AS DateTime), 1, 20)
INSERT [dbo].[Tb_Evaluaciones] ([IdEvaluacion], [Nombre], [Descripcion], [IdUnidad], [IdTipo], [IdGrupo], [FechaCreacion], [Estado], [Puntaje]) VALUES (14, N'Speaking Basico', N'qwerwqerwqer', 7, 2, N'YXrqFG9f', CAST(N'2024-02-01T00:00:00.000' AS DateTime), 0, 20)
INSERT [dbo].[Tb_Evaluaciones] ([IdEvaluacion], [Nombre], [Descripcion], [IdUnidad], [IdTipo], [IdGrupo], [FechaCreacion], [Estado], [Puntaje]) VALUES (15, N'Speaking Basico', N'ewqrqwerqwer', 1, 5, N'YXrqFG9f', CAST(N'2024-02-01T00:00:00.000' AS DateTime), 1, 10)
INSERT [dbo].[Tb_Evaluaciones] ([IdEvaluacion], [Nombre], [Descripcion], [IdUnidad], [IdTipo], [IdGrupo], [FechaCreacion], [Estado], [Puntaje]) VALUES (16, N'Speaking Basico', N'kvfsdgkfsdakasdfk', 7, 5, N'YXrqFG9f', CAST(N'2024-02-01T00:00:00.000' AS DateTime), 0, 10)
INSERT [dbo].[Tb_Evaluaciones] ([IdEvaluacion], [Nombre], [Descripcion], [IdUnidad], [IdTipo], [IdGrupo], [FechaCreacion], [Estado], [Puntaje]) VALUES (17, N'Speaking Basico', N'Adquisicion de nuevo vocabulario', 7, 2, N'4iQLtzqp', CAST(N'2024-02-15T00:00:00.000' AS DateTime), 1, 20)
INSERT [dbo].[Tb_Evaluaciones] ([IdEvaluacion], [Nombre], [Descripcion], [IdUnidad], [IdTipo], [IdGrupo], [FechaCreacion], [Estado], [Puntaje]) VALUES (18, N'Speaking Basico', N'Se realiza un pequeño repaso', 1, 2, N'uafQ2FMm', CAST(N'2024-02-15T00:00:00.000' AS DateTime), 1, 10)
INSERT [dbo].[Tb_Evaluaciones] ([IdEvaluacion], [Nombre], [Descripcion], [IdUnidad], [IdTipo], [IdGrupo], [FechaCreacion], [Estado], [Puntaje]) VALUES (19, N'Etica y Moralidad de los estudiantes', N'Enseñanza de la ética y valores que tienen que adquirir los estudiantes al momento de realizar los procedimientos dentro del entorno laboral', 7, 2, N'CXThc4vO', CAST(N'2024-02-25T00:00:00.000' AS DateTime), 0, 15)
INSERT [dbo].[Tb_Evaluaciones] ([IdEvaluacion], [Nombre], [Descripcion], [IdUnidad], [IdTipo], [IdGrupo], [FechaCreacion], [Estado], [Puntaje]) VALUES (20, N'Etica y Moralidad de los estudiantes', N'Enseñanza de la ética y valores que tienen que adquirir los estudiantes al momento de realizar los procedimientos en el entorno laboral', 1, 1, N'CXThc4vO', CAST(N'2024-02-25T00:00:00.000' AS DateTime), 1, 15)
SET IDENTITY_INSERT [dbo].[Tb_Evaluaciones] OFF
GO
SET IDENTITY_INSERT [dbo].[Tb_genero] ON 

INSERT [dbo].[Tb_genero] ([IdGenero], [Nombre], [Estado]) VALUES (1, N'Hombre', 1)
INSERT [dbo].[Tb_genero] ([IdGenero], [Nombre], [Estado]) VALUES (2, N'Binario', 0)
INSERT [dbo].[Tb_genero] ([IdGenero], [Nombre], [Estado]) VALUES (3, N'Mujer', 1)
INSERT [dbo].[Tb_genero] ([IdGenero], [Nombre], [Estado]) VALUES (4, N'Frescolate', 0)
INSERT [dbo].[Tb_genero] ([IdGenero], [Nombre], [Estado]) VALUES (5, N'Frescolate', 0)
INSERT [dbo].[Tb_genero] ([IdGenero], [Nombre], [Estado]) VALUES (6, N'pokemon', 0)
INSERT [dbo].[Tb_genero] ([IdGenero], [Nombre], [Estado]) VALUES (7, N'binario 2', 0)
INSERT [dbo].[Tb_genero] ([IdGenero], [Nombre], [Estado]) VALUES (8, N'{4*5}', 0)
INSERT [dbo].[Tb_genero] ([IdGenero], [Nombre], [Estado]) VALUES (9, N'Prefiero no decirlo', 0)
SET IDENTITY_INSERT [dbo].[Tb_genero] OFF
GO
SET IDENTITY_INSERT [dbo].[Tb_Tracker] ON 

INSERT [dbo].[Tb_Tracker] ([IdTracker], [Titulo], [Estado], [Activo], [IdEstudiante], [FechaInicio], [FechaFinalizacion]) VALUES (1, N'Practica con los estudiante del verbo to be', N'En proceso', 1, N'64646464', CAST(N'2024-02-22' AS Date), CAST(N'2024-02-24' AS Date))
INSERT [dbo].[Tb_Tracker] ([IdTracker], [Titulo], [Estado], [Activo], [IdEstudiante], [FechaInicio], [FechaFinalizacion]) VALUES (2, N'Vocabulario basico', N'Pendiente', 0, N'64646464', CAST(N'2024-02-22' AS Date), CAST(N'2024-02-23' AS Date))
INSERT [dbo].[Tb_Tracker] ([IdTracker], [Titulo], [Estado], [Activo], [IdEstudiante], [FechaInicio], [FechaFinalizacion]) VALUES (3, N'Vocabulario basico', N'Pendiente', 1, N'64646464', CAST(N'2024-02-23' AS Date), CAST(N'2024-02-27' AS Date))
INSERT [dbo].[Tb_Tracker] ([IdTracker], [Titulo], [Estado], [Activo], [IdEstudiante], [FechaInicio], [FechaFinalizacion]) VALUES (4, N'Enseñanza del verbo to be', N'Realizado', 1, N'74136925', CAST(N'2024-02-26' AS Date), CAST(N'2024-02-27' AS Date))
INSERT [dbo].[Tb_Tracker] ([IdTracker], [Titulo], [Estado], [Activo], [IdEstudiante], [FechaInicio], [FechaFinalizacion]) VALUES (5, N'Clase 1', N'Pendiente', 1, N'45625874', CAST(N'2024-02-26' AS Date), CAST(N'2024-02-27' AS Date))
SET IDENTITY_INSERT [dbo].[Tb_Tracker] OFF
GO
SET IDENTITY_INSERT [dbo].[Tb_unidad] ON 

INSERT [dbo].[Tb_unidad] ([IdUnidad], [Nombre], [Estado]) VALUES (1, N'I Unidad', 1)
INSERT [dbo].[Tb_unidad] ([IdUnidad], [Nombre], [Estado]) VALUES (2, N'Active thinking', 0)
INSERT [dbo].[Tb_unidad] ([IdUnidad], [Nombre], [Estado]) VALUES (3, N'Writing Fast', 0)
INSERT [dbo].[Tb_unidad] ([IdUnidad], [Nombre], [Estado]) VALUES (4, N'thinking', 0)
INSERT [dbo].[Tb_unidad] ([IdUnidad], [Nombre], [Estado]) VALUES (5, N'Pensamiento', 0)
INSERT [dbo].[Tb_unidad] ([IdUnidad], [Nombre], [Estado]) VALUES (6, N'Thinking 2', 0)
INSERT [dbo].[Tb_unidad] ([IdUnidad], [Nombre], [Estado]) VALUES (7, N'II Unidad', 1)
INSERT [dbo].[Tb_unidad] ([IdUnidad], [Nombre], [Estado]) VALUES (8, N'III Unidad', 1)
INSERT [dbo].[Tb_unidad] ([IdUnidad], [Nombre], [Estado]) VALUES (11, N'Listening', 0)
INSERT [dbo].[Tb_unidad] ([IdUnidad], [Nombre], [Estado]) VALUES (12, N'IV Unidad', 1)
INSERT [dbo].[Tb_unidad] ([IdUnidad], [Nombre], [Estado]) VALUES (13, N'V Unidad', 1)
INSERT [dbo].[Tb_unidad] ([IdUnidad], [Nombre], [Estado]) VALUES (14, N'VI Unidad', 0)
INSERT [dbo].[Tb_unidad] ([IdUnidad], [Nombre], [Estado]) VALUES (15, N'auditoria', 0)
INSERT [dbo].[Tb_unidad] ([IdUnidad], [Nombre], [Estado]) VALUES (16, N'practicas', 0)
SET IDENTITY_INSERT [dbo].[Tb_unidad] OFF
GO
SET IDENTITY_INSERT [dbo].[Tracker_Evidencia] ON 

INSERT [dbo].[Tracker_Evidencia] ([IdTracker], [TrackerId], [EvidenciaId]) VALUES (1, 1, 13)
INSERT [dbo].[Tracker_Evidencia] ([IdTracker], [TrackerId], [EvidenciaId]) VALUES (2, 1, 14)
INSERT [dbo].[Tracker_Evidencia] ([IdTracker], [TrackerId], [EvidenciaId]) VALUES (3, 1, 15)
INSERT [dbo].[Tracker_Evidencia] ([IdTracker], [TrackerId], [EvidenciaId]) VALUES (4, 3, 16)
INSERT [dbo].[Tracker_Evidencia] ([IdTracker], [TrackerId], [EvidenciaId]) VALUES (5, 4, 17)
INSERT [dbo].[Tracker_Evidencia] ([IdTracker], [TrackerId], [EvidenciaId]) VALUES (6, 5, 18)
INSERT [dbo].[Tracker_Evidencia] ([IdTracker], [TrackerId], [EvidenciaId]) VALUES (7, 4, 19)
SET IDENTITY_INSERT [dbo].[Tracker_Evidencia] OFF
GO
SET IDENTITY_INSERT [dbo].[usuario] ON 

INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (64, N'12345687', N'fc7739bc9cb0fbdb761637a3e231966d', CAST(N'2024-02-26T00:00:00.000' AS DateTime), 1, 26)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (20, N'12478523', N'c7c85ef9ecf820ed8580e85e67cc76d3', CAST(N'2024-01-05T00:00:00.000' AS DateTime), 0, 26)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (23, N'14725836', N'$2y$12$wRZhOfVwEcton9C0IrEsS.o6bBfwTu8./4JYPvE/hNCTI7iRBZkEy', CAST(N'2024-01-09T00:00:00.000' AS DateTime), 0, 29)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (57, N'17902880', N'$2y$12$Ptygzoq/BFS4goUW77ego.jxQJKDx2XXR/WAz64c40gHXVW7VFL.O', CAST(N'2024-02-15T00:00:00.000' AS DateTime), 0, 26)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (58, N'17906136', N'$2y$12$DgDxjmQHhEt2q2OR8XyLOOD3e33zZa4yo2/U0fmnD5TbfdjEd6xqK', CAST(N'2024-02-15T00:00:00.000' AS DateTime), 0, 29)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (63, N'19900781', N'$2y$12$CMrhsKlmAa5ks8sptx7lF.U4OUnFhkk7I1l7t5ChO/JsR3f3kl7Bq', CAST(N'2024-02-26T00:00:00.000' AS DateTime), 1, 1)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (1, N'19907324', N'$2y$12$RbuP1caj9KZp.mSI.nNcAOuDrBX42xdtIYH.MdGz50dPEexV92lUW', CAST(N'2023-12-18T17:39:09.753' AS DateTime), 1, 1)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (55, N'19907335', N'$2y$12$KKdQXX6Gf2hvirGVaKE.beavU0SSHn3T8yH5dJYTUtM4JY5t7DKjy', CAST(N'2024-02-15T00:00:00.000' AS DateTime), 0, 29)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (59, N'19907346', N'$2y$12$ZOpT8ZhuQfzlwuJfeMLv5.9pKuZfz4BvHovJYPYmKmTQ6pqpuS.uy', CAST(N'2024-02-15T00:00:00.000' AS DateTime), 0, 29)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (56, N'19907576', N'$2y$12$eDYbZ9G3h6EzKGroHrhqw.huvgqarnT8l2l.H.TZyH8hvajwu7KHG', CAST(N'2024-02-15T00:00:00.000' AS DateTime), 0, 29)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (18, N'21212121', N'b2c20203176a48d7516e8cf3c0b5edeb', CAST(N'2024-01-03T00:00:00.000' AS DateTime), 0, 29)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (27, N'22222222', N'8f6800894d207ac44dd6c916b66c0c57', CAST(N'2024-01-16T00:00:00.000' AS DateTime), 0, 26)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (28, N'25252525', N'cd4e5795053cf4da05a6e7721560319a', CAST(N'2024-01-16T00:00:00.000' AS DateTime), 0, 26)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (24, N'25814736', N'a9a33fcc66203ce3f0787bbbebcbeb06', CAST(N'2024-01-09T00:00:00.000' AS DateTime), 0, 29)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (48, N'25874136', N'ae4e7d1e1d5a5f92b9a7524e21138c94', CAST(N'2024-02-14T00:00:00.000' AS DateTime), 0, 29)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (29, N'44444444', N'$2y$12$H6En.I/uWuqgJuZ3h5.R8uMjZHmudPrs0pLEhIBU35aS6eaJsidDa', CAST(N'2024-01-26T00:00:00.000' AS DateTime), 0, 26)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (61, N'45625874', N'$2y$12$dJhq8qZbZ5NlPrJEiiL1PuNA.0nmKam9UO4jtbYVRv0qS9R2uKqzi', CAST(N'2024-02-25T00:00:00.000' AS DateTime), 1, 29)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (43, N'45678911', N'2878ccbbb2c9bc2a72575404b3abb825', CAST(N'2024-02-09T04:20:10.370' AS DateTime), 1, 26)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (41, N'45678912', N'2878ccbbb2c9bc2a72575404b3abb825', CAST(N'2024-02-09T04:12:18.510' AS DateTime), 1, 26)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (46, N'63214785', N'$2y$12$LwfnciaYWxsFDeAFRwX9meRSQn/osl4BMrP4HAYbxeCrf3eWpcs72', CAST(N'2024-02-09T00:00:00.000' AS DateTime), 0, 29)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (22, N'64646464', N'$2y$12$INnW/E.0gdPLlxiFEKjP..oo1qiJrCKo8plUUNB2yUnon55pAOtfS', CAST(N'2024-01-09T00:00:00.000' AS DateTime), 0, 29)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (53, N'65419519', N'$2y$12$/RCF31THgDnI6zcwG7lkN.cb65WiKVhj0tgCOoybwjUX13qReu3D6', CAST(N'2024-02-15T00:00:00.000' AS DateTime), 0, 1)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (21, N'69696969', N'$2y$12$PJWE45CEcqtK9g4crujdduuqC0gvjaV19cQguWEGKjdp4p98zRhH6', CAST(N'2024-01-05T00:00:00.000' AS DateTime), 0, 29)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (62, N'74136925', N'$2y$12$STML6OH6tZIne2pMWdgVkOXIvpvYt5JbM0c8QU8Kgm8sHYkqQ6s5i', CAST(N'2024-02-25T00:00:00.000' AS DateTime), 1, 29)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (16, N'87878787', N'$2y$12$pWTIuAGcwBhXYASGG3nA8.32eoYXUsmUzZQOCinT.O743mMRJCcC2', CAST(N'2023-12-29T00:00:00.000' AS DateTime), 0, 26)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (26, N'88888888', N'32332ddbcf7b60777a4fceb51c2134a9', CAST(N'2024-01-15T00:00:00.000' AS DateTime), 0, 29)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (52, N'90171718', N'$2y$12$BywVYpJValKcxYr.nHsPfO/EeTqfxyJkJV2RIUJtW5Rco.71ta3W.', CAST(N'2024-02-15T00:00:00.000' AS DateTime), 0, 1)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (54, N'98254184', N'$2y$12$DspQ9.3CdpFgAu/cAfnUiOFNV1e0ylmp.bh2iOstypFQRiRAzWTXq', CAST(N'2024-02-15T00:00:00.000' AS DateTime), 0, 26)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (60, N'98754123', N'$2y$12$Dsfg4Ly3mpugSJb0ucIO8OFk6DQIRIuu///TO/AfFMNx9W7FvaMJu', CAST(N'2024-02-25T00:00:00.000' AS DateTime), 1, 26)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (17, N'98989898', N'$2y$12$8kN4PHD0Mc0Xov0VUn7/YeXEKCZ4mxcopVkrxHxb26IQ.UkIbLYq2', CAST(N'2024-01-03T00:00:00.000' AS DateTime), 0, 26)
INSERT [dbo].[usuario] ([id], [Identificacion], [password], [FechaCreacion], [Estado], [IdRol]) VALUES (25, N'99999999', N'$2y$12$8qKvY6tySFPDUrf0dBDUXe7A.ogCB7UIbKV56kmv0KF4mPI/XYznu', CAST(N'2024-01-09T00:00:00.000' AS DateTime), 0, 29)
SET IDENTITY_INSERT [dbo].[usuario] OFF
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [personal_access_tokens_token_unique]    Script Date: 11/3/2024 08:07:17 ******/
CREATE UNIQUE NONCLUSTERED INDEX [personal_access_tokens_token_unique] ON [dbo].[personal_access_tokens]
(
	[token] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [personal_access_tokens_tokenable_type_tokenable_id_index]    Script Date: 11/3/2024 08:07:17 ******/
CREATE NONCLUSTERED INDEX [personal_access_tokens_tokenable_type_tokenable_id_index] ON [dbo].[personal_access_tokens]
(
	[tokenable_type] ASC,
	[tokenable_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
ALTER TABLE [dbo].[Estudiante]  WITH CHECK ADD  CONSTRAINT [FK_Estudiante_Tb_empresa] FOREIGN KEY([idEmpresa])
REFERENCES [dbo].[Tb_empresa] ([IdEmpresa])
GO
ALTER TABLE [dbo].[Estudiante] CHECK CONSTRAINT [FK_Estudiante_Tb_empresa]
GO
ALTER TABLE [dbo].[Estudiante]  WITH CHECK ADD  CONSTRAINT [FK_Estudiante_Tb_genero] FOREIGN KEY([idGenero])
REFERENCES [dbo].[Tb_genero] ([IdGenero])
GO
ALTER TABLE [dbo].[Estudiante] CHECK CONSTRAINT [FK_Estudiante_Tb_genero]
GO
ALTER TABLE [dbo].[Estudiante]  WITH CHECK ADD  CONSTRAINT [FK_Estudiante_Usuario] FOREIGN KEY([Identificacion])
REFERENCES [dbo].[usuario] ([Identificacion])
GO
ALTER TABLE [dbo].[Estudiante] CHECK CONSTRAINT [FK_Estudiante_Usuario]
GO
ALTER TABLE [dbo].[EvaluacionCentro]  WITH CHECK ADD  CONSTRAINT [FK_EvaluacionCentro_Estudiante] FOREIGN KEY([IdEstudiante])
REFERENCES [dbo].[Estudiante] ([Identificacion])
GO
ALTER TABLE [dbo].[EvaluacionCentro] CHECK CONSTRAINT [FK_EvaluacionCentro_Estudiante]
GO
ALTER TABLE [dbo].[EvaluacionCentro]  WITH CHECK ADD  CONSTRAINT [FK_EvaluacionCentro_Maestro] FOREIGN KEY([IdMaestro])
REFERENCES [dbo].[Maestro] ([Identificacion])
GO
ALTER TABLE [dbo].[EvaluacionCentro] CHECK CONSTRAINT [FK_EvaluacionCentro_Maestro]
GO
ALTER TABLE [dbo].[EvaluacionCentro]  WITH CHECK ADD  CONSTRAINT [FK_EvaluacionCentro_Tb_empresa] FOREIGN KEY([IdEmpresa])
REFERENCES [dbo].[Tb_empresa] ([IdEmpresa])
GO
ALTER TABLE [dbo].[EvaluacionCentro] CHECK CONSTRAINT [FK_EvaluacionCentro_Tb_empresa]
GO
ALTER TABLE [dbo].[EvaluacionesXMaestro]  WITH CHECK ADD  CONSTRAINT [FK_EvaluacionesXMaestro_Maestro] FOREIGN KEY([MaestroId])
REFERENCES [dbo].[Maestro] ([Identificacion])
GO
ALTER TABLE [dbo].[EvaluacionesXMaestro] CHECK CONSTRAINT [FK_EvaluacionesXMaestro_Maestro]
GO
ALTER TABLE [dbo].[EvaluacionesXMaestro]  WITH CHECK ADD  CONSTRAINT [FK_EvaluacionesXMaestro_Tb_Evaluaciones] FOREIGN KEY([IdEvaluacion])
REFERENCES [dbo].[Tb_Evaluaciones] ([IdEvaluacion])
GO
ALTER TABLE [dbo].[EvaluacionesXMaestro] CHECK CONSTRAINT [FK_EvaluacionesXMaestro_Tb_Evaluaciones]
GO
ALTER TABLE [dbo].[EvaluacionXNotas]  WITH CHECK ADD  CONSTRAINT [FK_EvaluacionXNotas_Estudiante] FOREIGN KEY([idEstudiante])
REFERENCES [dbo].[Estudiante] ([Identificacion])
GO
ALTER TABLE [dbo].[EvaluacionXNotas] CHECK CONSTRAINT [FK_EvaluacionXNotas_Estudiante]
GO
ALTER TABLE [dbo].[EvaluacionXNotas]  WITH CHECK ADD  CONSTRAINT [FK_EvaluacionXNotas_Tb_Evaluaciones] FOREIGN KEY([idEvaluacion])
REFERENCES [dbo].[Tb_Evaluaciones] ([IdEvaluacion])
GO
ALTER TABLE [dbo].[EvaluacionXNotas] CHECK CONSTRAINT [FK_EvaluacionXNotas_Tb_Evaluaciones]
GO
ALTER TABLE [dbo].[Evidencias_Tb]  WITH CHECK ADD  CONSTRAINT [FK_Evidencias_Tb_Tb_empresa] FOREIGN KEY([idEmpresa])
REFERENCES [dbo].[Tb_empresa] ([IdEmpresa])
GO
ALTER TABLE [dbo].[Evidencias_Tb] CHECK CONSTRAINT [FK_Evidencias_Tb_Tb_empresa]
GO
ALTER TABLE [dbo].[EvidenciasXEstudiante]  WITH CHECK ADD  CONSTRAINT [FK_EvidenciasXEstudiante_Estudiante] FOREIGN KEY([idEstudiante])
REFERENCES [dbo].[Estudiante] ([Identificacion])
GO
ALTER TABLE [dbo].[EvidenciasXEstudiante] CHECK CONSTRAINT [FK_EvidenciasXEstudiante_Estudiante]
GO
ALTER TABLE [dbo].[EvidenciasXEstudiante]  WITH CHECK ADD  CONSTRAINT [FK_EvidenciasXEstudiante_Evidencias_Tb] FOREIGN KEY([idEvidencia])
REFERENCES [dbo].[Evidencias_Tb] ([idEvidencia])
GO
ALTER TABLE [dbo].[EvidenciasXEstudiante] CHECK CONSTRAINT [FK_EvidenciasXEstudiante_Evidencias_Tb]
GO
ALTER TABLE [dbo].[GrupoXMaestro]  WITH CHECK ADD  CONSTRAINT [FK_GrupoXMaestro_Grupos] FOREIGN KEY([IdGrupo])
REFERENCES [dbo].[Grupos] ([Identificacion])
GO
ALTER TABLE [dbo].[GrupoXMaestro] CHECK CONSTRAINT [FK_GrupoXMaestro_Grupos]
GO
ALTER TABLE [dbo].[GrupoXMaestro]  WITH CHECK ADD  CONSTRAINT [FK_GrupoXMaestro_Maestro] FOREIGN KEY([IdMaestro])
REFERENCES [dbo].[Maestro] ([Identificacion])
GO
ALTER TABLE [dbo].[GrupoXMaestro] CHECK CONSTRAINT [FK_GrupoXMaestro_Maestro]
GO
ALTER TABLE [dbo].[GrupoXMaestro]  WITH CHECK ADD  CONSTRAINT [FK_GrupoXMaestro_Usuario] FOREIGN KEY([IdMaestro])
REFERENCES [dbo].[usuario] ([Identificacion])
GO
ALTER TABLE [dbo].[GrupoXMaestro] CHECK CONSTRAINT [FK_GrupoXMaestro_Usuario]
GO
ALTER TABLE [dbo].[Maestro]  WITH CHECK ADD  CONSTRAINT [FK_Maestro_Tb_genero] FOREIGN KEY([idGenero])
REFERENCES [dbo].[Tb_genero] ([IdGenero])
GO
ALTER TABLE [dbo].[Maestro] CHECK CONSTRAINT [FK_Maestro_Tb_genero]
GO
ALTER TABLE [dbo].[Maestro]  WITH CHECK ADD  CONSTRAINT [FK_Maestro_Usuario] FOREIGN KEY([Identificacion])
REFERENCES [dbo].[usuario] ([Identificacion])
GO
ALTER TABLE [dbo].[Maestro] CHECK CONSTRAINT [FK_Maestro_Usuario]
GO
ALTER TABLE [dbo].[ProcesoXPermiso]  WITH CHECK ADD  CONSTRAINT [FK_ProcesoXPermiso_Permisos] FOREIGN KEY([Permiso_Id])
REFERENCES [dbo].[Permisos] ([Id])
GO
ALTER TABLE [dbo].[ProcesoXPermiso] CHECK CONSTRAINT [FK_ProcesoXPermiso_Permisos]
GO
ALTER TABLE [dbo].[ProcesoXPermiso]  WITH CHECK ADD  CONSTRAINT [FK_ProcesoXPermiso_Procesos] FOREIGN KEY([Proceso_Id])
REFERENCES [dbo].[Procesos] ([IdProceso])
GO
ALTER TABLE [dbo].[ProcesoXPermiso] CHECK CONSTRAINT [FK_ProcesoXPermiso_Procesos]
GO
ALTER TABLE [dbo].[ReportesTb]  WITH CHECK ADD  CONSTRAINT [FK_ReportesTb_Estudiante] FOREIGN KEY([IdAlumno])
REFERENCES [dbo].[Estudiante] ([Identificacion])
GO
ALTER TABLE [dbo].[ReportesTb] CHECK CONSTRAINT [FK_ReportesTb_Estudiante]
GO
ALTER TABLE [dbo].[ReportesTb]  WITH CHECK ADD  CONSTRAINT [FK_ReportesTb_Maestro] FOREIGN KEY([IdMaestro])
REFERENCES [dbo].[Maestro] ([Identificacion])
GO
ALTER TABLE [dbo].[ReportesTb] CHECK CONSTRAINT [FK_ReportesTb_Maestro]
GO
ALTER TABLE [dbo].[RolesXPermisos]  WITH CHECK ADD  CONSTRAINT [FK_RolesXPermisos_Permisos] FOREIGN KEY([Permisos_Id])
REFERENCES [dbo].[Permisos] ([Id])
GO
ALTER TABLE [dbo].[RolesXPermisos] CHECK CONSTRAINT [FK_RolesXPermisos_Permisos]
GO
ALTER TABLE [dbo].[RolesXPermisos]  WITH CHECK ADD  CONSTRAINT [FK_RolesXPermisos_Roles] FOREIGN KEY([Roles_id])
REFERENCES [dbo].[Roles] ([IdRol])
GO
ALTER TABLE [dbo].[RolesXPermisos] CHECK CONSTRAINT [FK_RolesXPermisos_Roles]
GO
ALTER TABLE [dbo].[Supervision_Tb]  WITH CHECK ADD  CONSTRAINT [FK_Supervision_Tb_Cat_supervision] FOREIGN KEY([IdTipoSupervision])
REFERENCES [dbo].[Cat_supervision] ([IdCatSupervision])
GO
ALTER TABLE [dbo].[Supervision_Tb] CHECK CONSTRAINT [FK_Supervision_Tb_Cat_supervision]
GO
ALTER TABLE [dbo].[Supervision_Tb]  WITH CHECK ADD  CONSTRAINT [FK_Supervision_Tb_Estudiante] FOREIGN KEY([idEstudiante])
REFERENCES [dbo].[Estudiante] ([Identificacion])
GO
ALTER TABLE [dbo].[Supervision_Tb] CHECK CONSTRAINT [FK_Supervision_Tb_Estudiante]
GO
ALTER TABLE [dbo].[Supervision_Tb]  WITH CHECK ADD  CONSTRAINT [FK_Supervision_Tb_Maestro] FOREIGN KEY([idDocente])
REFERENCES [dbo].[Maestro] ([Identificacion])
GO
ALTER TABLE [dbo].[Supervision_Tb] CHECK CONSTRAINT [FK_Supervision_Tb_Maestro]
GO
ALTER TABLE [dbo].[Supervision_Tb]  WITH CHECK ADD  CONSTRAINT [FK_Supervision_Tb_Tb_empresa] FOREIGN KEY([idEmpresa])
REFERENCES [dbo].[Tb_empresa] ([IdEmpresa])
GO
ALTER TABLE [dbo].[Supervision_Tb] CHECK CONSTRAINT [FK_Supervision_Tb_Tb_empresa]
GO
ALTER TABLE [dbo].[Tb_Evaluaciones]  WITH CHECK ADD  CONSTRAINT [FK_Tb_Evaluaciones_Cat_evaluacion] FOREIGN KEY([IdTipo])
REFERENCES [dbo].[Cat_evaluacion] ([IdCatEvaluacion])
GO
ALTER TABLE [dbo].[Tb_Evaluaciones] CHECK CONSTRAINT [FK_Tb_Evaluaciones_Cat_evaluacion]
GO
ALTER TABLE [dbo].[Tb_Evaluaciones]  WITH CHECK ADD  CONSTRAINT [FK_Tb_Evaluaciones_Grupos] FOREIGN KEY([IdGrupo])
REFERENCES [dbo].[Grupos] ([Identificacion])
GO
ALTER TABLE [dbo].[Tb_Evaluaciones] CHECK CONSTRAINT [FK_Tb_Evaluaciones_Grupos]
GO
ALTER TABLE [dbo].[Tb_Evaluaciones]  WITH CHECK ADD  CONSTRAINT [FK_Tb_Evaluaciones_Tb_unidad] FOREIGN KEY([IdUnidad])
REFERENCES [dbo].[Tb_unidad] ([IdUnidad])
GO
ALTER TABLE [dbo].[Tb_Evaluaciones] CHECK CONSTRAINT [FK_Tb_Evaluaciones_Tb_unidad]
GO
ALTER TABLE [dbo].[Tb_Tracker]  WITH CHECK ADD  CONSTRAINT [FK_Tb_Tracker_Estudiante] FOREIGN KEY([IdEstudiante])
REFERENCES [dbo].[Estudiante] ([Identificacion])
GO
ALTER TABLE [dbo].[Tb_Tracker] CHECK CONSTRAINT [FK_Tb_Tracker_Estudiante]
GO
ALTER TABLE [dbo].[Tracker_Evidencia]  WITH CHECK ADD  CONSTRAINT [FK_Tracker_Evidencia_Evidencias_Tb] FOREIGN KEY([EvidenciaId])
REFERENCES [dbo].[Evidencias_Tb] ([idEvidencia])
GO
ALTER TABLE [dbo].[Tracker_Evidencia] CHECK CONSTRAINT [FK_Tracker_Evidencia_Evidencias_Tb]
GO
ALTER TABLE [dbo].[Tracker_Evidencia]  WITH CHECK ADD  CONSTRAINT [FK_Tracker_Evidencia_Tb_Tracker] FOREIGN KEY([TrackerId])
REFERENCES [dbo].[Tb_Tracker] ([IdTracker])
GO
ALTER TABLE [dbo].[Tracker_Evidencia] CHECK CONSTRAINT [FK_Tracker_Evidencia_Tb_Tracker]
GO
ALTER TABLE [dbo].[usuario]  WITH NOCHECK ADD  CONSTRAINT [FK_Usuario_Roles] FOREIGN KEY([IdRol])
REFERENCES [dbo].[Roles] ([IdRol])
GO
ALTER TABLE [dbo].[usuario] NOCHECK CONSTRAINT [FK_Usuario_Roles]
GO
/****** Object:  StoredProcedure [dbo].[SaveRol]    Script Date: 11/3/2024 08:07:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[SaveRol] 
	-- Add the parameters for the stored procedure here
	@nombre nvarchar(50)
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	INSERT INTO Roles (Nombre,Estado) 
	VALUES(@nombre,1)
END
GO
USE [master]
GO
ALTER DATABASE [proyecto_final] SET  READ_WRITE 
GO
